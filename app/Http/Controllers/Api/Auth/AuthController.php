<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    public function __construct(
        private Logger $logger
    )
    {}

    public function login(LoginRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $accessToken = $this->createAccessToken($validated);

        if(!$accessToken)
        {
            $this->logger->warning("Failed Login Attempt: Invalid Credentials", [ "identifier" => $validated['username'] ]);
            return Response::error("Invalid Credentials", status: 401);
        }

        $this->logger->info("User Logged In Successfully", [ "user_id" => Auth::id() ]);
        
        return $this->respondWithToken("User Logged In Successfully", $accessToken);

    }

    public function me(): JsonResponse
    {
        return Response::success("User Fetched Successfully", Auth::user());
    }

    public function logout(): JsonResponse
    {
        $userId = Auth::id();
        Auth::logout();
        $this->logger->info("User Logged Out Successfully", [  "user_id" => $userId ]);
        return Response::success("User Logged Out Successfully");
    }

    public function refresh(): JsonResponse
    {
        return $this->respondWithToken("Refreshed Token Successfully", Auth::refresh());
    }

    private function createAccessToken($validated): string | false {

        $requestUser = $validated["username"];

        $credentials = filter_var($requestUser, FILTER_VALIDATE_EMAIL)
            ? ["email" => $requestUser]
            : ["username" => $requestUser];

        $credentials["password"] = $validated["password"];

        return Auth::attempt($credentials);
    }

    protected function respondWithToken($message, $accessToken): JsonResponse
    {
        return Response::success(
            $message, [
                "access_token" => $accessToken,
                "token_type" => "bearer",
                "expires_in" => Auth::factory()->getTTL() * 60
        ]);
    }
}
