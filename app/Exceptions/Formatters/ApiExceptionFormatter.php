<?php

namespace App\Exceptions\Formatters;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Exception\CommandNotFoundException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response as StatusCode;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class ApiExceptionFormatter
{
    
    private $logger;
    private $request;

    public function __construct(
        Request $request
    )
    {
        $this->request = $request;
        $this->logger = Log::build(["driver" => "daily", "path" => storage_path('logs/exceptions/exceptions-logs.log')]);
    }

    private function getRegisteredExceptions(): array 
    {
        return [
                AuthorizationException::class => [
                    'message' => 'Unauthorized Action.',
                    'status' => StatusCode::HTTP_FORBIDDEN
                ],
                AccessDeniedHttpException::class => [
                    'message' => 'Access Denied.',
                    'status' => StatusCode::HTTP_FORBIDDEN
                ],
                CommandNotFoundException::class => [
                    'message' => 'Command Not Found.',
                    'status' => StatusCode::HTTP_NOT_FOUND 
                ],
                MethodNotAllowedHttpException::class => [
                    'message' => 'Method Not Allowed.',
                    'status' => StatusCode::HTTP_METHOD_NOT_ALLOWED 
                ],
                JWTException::class => [
                    'message' => 'Token is Missing, Expired, or Invalid.',
                    'status' => StatusCode::HTTP_UNAUTHORIZED
                ],
                NotFoundHttpException::class => [
                    'message' => 'Resource Not Found.',
                    'status' => StatusCode::HTTP_NOT_FOUND
                ]
            ];
    }

    public function format(Throwable $exception): JsonResponse
    {
        $responseError = [
            'exception' => get_class($exception),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTrace(),
        ];

        if($exception instanceof ValidationException){
            $this->logger->warning("Request Error: " . $this->request->url(), ["status" => StatusCode::HTTP_UNPROCESSABLE_ENTITY , "errors" => $exception->errors()]);
            return Response::fail(message: "Request Error", errors: $exception->errors(), status: StatusCode::HTTP_UNPROCESSABLE_ENTITY );
        }

        $status = $this->getStatus($exception);

        if($formatted = $this->formatRegisterdExceptions($exception, $responseError)){
            return $formatted;
        }

        $message = $status === StatusCode::HTTP_INTERNAL_SERVER_ERROR ? 'Server Error' : $exception->getMessage();
        
        $this->log($message, $status, $responseError);
        return Response::error(message: $message, errors: $responseError, status: $status);
    }

    private function getStatus($exception){
        $exceptionCode = $exception->getCode();

        return $exception instanceof HttpExceptionInterface 
            ? $exception->getStatusCode()
            : ($this->isValidStatusCode($exceptionCode)
                ? $exceptionCode
                : StatusCode::HTTP_INTERNAL_SERVER_ERROR
            );
    }

    private function formatRegisterdExceptions($exceptions, $responseError) {
        foreach($this->getRegisteredExceptions() as $exception => $data) {
            if ($exceptions instanceof $exception) {
                $this->log($data['message'], $data['status'], $responseError);
                return Response::error(message: $data['message'], errors: $responseError, status: $data['status']);
            }
        }
        return null;
    }
    
    private function isValidStatusCode($code): bool
    {
        return is_int($code) && $code >= 100 && $code <= 599;
    }

    private function log($message, $status, $error) {
        $error['trace'] = null;

        $this->logger->critical(
            message: "Server Error: " . $message, 
            context: [
                "status" => $status , 
                $error
        ]);
    }
    



}
