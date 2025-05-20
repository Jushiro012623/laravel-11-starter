<?php

namespace App\Exceptions\Formatters;

use Illuminate\Auth\Access\AuthorizationException;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

use Illuminate\Validation\ValidationException;

use Symfony\Component\Console\Exception\CommandNotFoundException;

use Symfony\Component\HttpFoundation\Response as StatusCode;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Tymon\JWTAuth\Exceptions\JWTException;

use Throwable;

class ApiExceptionFormatter
{

    private $logger;
    private $request;

    /**
         * ApiExceptionFormatter constructor.
         *
         * @param Request $request
    */
    public function __construct(Request $request) {
        $this->request = $request;
        $this->logger = Log::build(["driver" => "daily", "path" => storage_path('logs/exceptions/exceptions-logs.log')]);
    }

   /**
         * Format Exceptions into a JsonResponse.
         *
         * @param Throwable $exception
         * @return JsonResponse
    */
    public function format(Throwable $exception): JsonResponse
    {
        if ($exception instanceof ValidationException) {
            $this->logger->warning("Request Error: " . $this->request->url(), ["status" => StatusCode::HTTP_UNPROCESSABLE_ENTITY, "errors" => $exception->errors()]);
            return Response::fail(message: "Request Error", errors: $exception->errors(), status: StatusCode::HTTP_UNPROCESSABLE_ENTITY);
        }

        $status = $this->getStatus($exception);

        $responseError = [
            'exception' => get_class($exception),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTrace(),
        ];

        if ($formatted = $this->formatRegisterdExceptions($exception, $responseError)) {
            return $formatted;
        }

        $message = $status === StatusCode::HTTP_INTERNAL_SERVER_ERROR ? 'Server Error' : $exception->getMessage();

        $this->log($message, $status, $responseError);
        return Response::error(message: $message, errors: $responseError, status: $status);
    }

    /**
         * Get the list of registered exceptions and their corresponding messages and status codes.
         *
         * @return array
    */
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

    /**
         * Get the HTTP status code for the given exception.
         *
         * @param Throwable $exception
         * @return int
    */
    private function getStatus($exception): int
    {
        $exceptionCode = $exception->getCode();

        return $exception instanceof HttpExceptionInterface
            ? $exception->getStatusCode()
            : ($this->isValidStatusCode($exceptionCode)
                ? $exceptionCode
                : StatusCode::HTTP_INTERNAL_SERVER_ERROR
            );
    }

    /**
         * Format registered exceptions if matched, otherwise return null.
         *
         * @param Throwable $exceptions
         * @param array $responseError
         * @return JsonResponse|null
    */
    private function formatRegisterdExceptions($exceptions, $responseError): JsonResponse | null
    {
        foreach ($this->getRegisteredExceptions() as $exception => $data) {
            if ($exceptions instanceof $exception) {
                $this->log($data['message'], $data['status'], $responseError);
                return Response::error(message: $data['message'], errors: $responseError, status: $data['status']);
            }
        }
        return null;
    }

    /**
         * Check if the given code is a valid HTTP status code.
         *
         * @param mixed $code
         * @return bool
    */
    private function isValidStatusCode($code): bool
    {
        return is_int($code) && $code >= 100 && $code <= 599;
    }

    /**
         * Log the error message and details.
         *
         * @param string $message
         * @param int $status
         * @param array $error
         * @return void
    */
    private function log($message, $status, $error): void
    {
        $error['trace'] = null;

        $this->logger->critical(
            message: "Server Error: " . $message,
            context: [
                "status" => $status,
                $error
            ]
        );
    }
}
