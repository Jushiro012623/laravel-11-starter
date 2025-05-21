<?php

namespace App\Http\Controllers\Api\Auth;

use App\Facades\OTP;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgotPasswordOTPRequest;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Models\User;
use App\Repositories\V1\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

use function Laravel\Prompts\error;

class ForgotPasswordController extends Controller
{
    private $inLocalState;
    
    public function __construct(
        private Logger $logger,
        private UserRepository $userRepository
    )
    {
        $this->inLocalState = config("app.ENABLE_OTP_SHOW");
    }

    public function forgotPasswordOTP(ForgotPasswordOTPRequest $request){

        $email = $request->validated("email");

        $otp = OTP::salt($email)->generate();
        $otp["otp_code"] = $this->inLocalState ? $otp["otp_code"] : null;
        
        $this->logger->info("Reset Password OTP Was Sent", ["user_email" => $email]);
        return Response::success("Forgot Password OTP Sent Successfully", $otp);
    }

    public function resetPassword(ForgotPasswordRequest $request)
    {
        $validated = $request->validated();

        if(! OTP::salt($validated['email'])->validate($validated))
        {
            $this->logger->warning("Reset Password Failed: Expired or Invalid OTP", ["email" => $request->validated("email")]);
            return Response::fail(message: "Expired or Invalid OTP", status: 400);
        }

        $user = $this->userRepository->getUserByEmail($validated["email"]);
        $this->userRepository->updateUserPassword($validated["password"], $user);

        $this->logger->info("User Forgotted Password Changed Successfully", ["user_id" => $user->id]);
        
        return Response::success("Password Changed Successfully");
        
    }
}
