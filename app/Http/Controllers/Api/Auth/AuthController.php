<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

/**
 * Handles authentication-related operations like login, logout, and token refresh.
 */
class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param Logger $logger
     */
    public function __construct(
        private Logger $logger
    ) {}

    /**
     * Authenticate the user and return an access token if credentials are valid.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $accessToken = $this->createAccessToken($validated);

        if (!$accessToken) {
            $this->logger->warning("Failed Login Attempt: Invalid Credentials", [
                "identifier" => $validated['username']
            ]);
            return Response::error("Invalid Credentials", status: 401);
        }

        $this->logger->info("User Logged In Successfully", [
            "user_id" => Auth::id()
        ]);

        return $this->respondWithToken("User Logged In Successfully", $accessToken);
    }

    /**
     * Get the currently authenticated user.
     *
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        return Response::success("User Fetched Successfully", Auth::user());
    }

    /**
     * Log the user out and invalidate the token.
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $userId = Auth::id();
        Auth::logout();

        $this->logger->info("User Logged Out Successfully", [
            "user_id" => $userId
        ]);

        return Response::success("User Logged Out Successfully");
    }

    /**
     * Refresh the JWT token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken("Refreshed Token Successfully", Auth::refresh());
    }

    /**
     * Attempt to create an access token using the validated credentials.
     *
     * @param array $validated
     * @return string|false
     */
    private function createAccessToken(array $validated): string|false
    {
        $requestUser = $validated["username"];

        $credentials = filter_var($requestUser, FILTER_VALIDATE_EMAIL)
            ? ["email" => $requestUser]
            : ["username" => $requestUser];

        $credentials["password"] = $validated["password"];

        return Auth::attempt($credentials);
    }

    /**
     * Build a JSON response with the access token data.
     *
     * @param string $message
     * @param string $accessToken
     * @return JsonResponse
     */
    protected function respondWithToken(string $message, string $accessToken): JsonResponse
    {
        return Response::success($message, [
            "access_token" => $accessToken,
            "token_type" => "bearer",
            "expires_in" => Auth::factory()->getTTL() * 60
        ]);
    }
}
