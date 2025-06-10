<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegistrationRequest;
use App\Http\Resources\V1\UserResources;
use App\Models\Address;
use App\Models\User;
use App\Models\UserInfo;
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

            $validated = $request->validated();

            $user = User::create($validated);

            $validated['user_id'] = $user->id;

            UserInfo::create($validated);
            Address::create($validated);    

            $userResource = new UserResources($user);

            $this->logger->info("User Registered Successfully", ['user_id' => $user->id]);

            return Response::success("User Registered Successfully", $userResource, 201);
        });
    }
}
