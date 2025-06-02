<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegistrationRequest;
use App\Http\Resources\V1\UserResources;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

/**
 * Handles user registration.
 */
class RegistrationController extends Controller
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
     * Register a new user.
     *
     * @param RegistrationRequest $request
     * @return JsonResponse
     */
    public function __invoke(RegistrationRequest $request): JsonResponse
    {
        return DB::transaction(function () use ($request) {

            // Create new user with validated request data
            $user = User::create($request->validated());

            // Transform user using resource class
            $userResource = new UserResources($user);

            // Log registration event
            $this->logger->info("User Registered Successfully", ['user_id' => $user->id]);

            // Return success response with resource and 201 status
            return Response::success("User Registered Successfully", $userResource, 201);
        });
    }
}
