<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegistrationRequest;
use App\Http\Resources\V1\UserResources;
use App\Models\User;
use App\Repositories\V1\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class RegistrationController extends Controller
{

    public function __construct(
        private Logger $logger
    )
    {}
    
    public function __invoke(RegistrationRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $user = User::create($request->validated());
            $user = new UserResources($user);
            
            $this->logger->info("User Registered Successfully", ['user_id' => $user->id]);
            return Response::success("User Registered Successfully", $user, 201);

        });
    }
    
}
