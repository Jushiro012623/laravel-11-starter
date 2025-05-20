<?php

namespace App\Http\Controllers\Api\Auth;

use App\Facades\OTP;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\VerifyEmailRequest;
use App\Repositories\V1\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class VerifyEmailController extends Controller
{

    private $inLocalState;

    public function __construct(
        private Logger $logger,
        private UserRepository $userRepository
    )
    {
        $this->inLocalState = config("app.ENABLE_OTP_SHOW");
    }
    
    public function verifyEmailOTP() {
        
        if(Auth::user()->hasVerifiedEmail()){
            return Response::fail("This Email is Already Verified", status: 400);
        }

        $otp = OTP::generate();
        $otp["otp_code"] = $this->inLocalState ? $otp["otp_code"] : null;
        
        $this->logger->info("Email Verification Code Was Sent", ["user_email" => Auth::user()->email ]);
        return Response::success("Verification Code Was Sent Successfully", $otp);
    }

    public function verifyEmail(VerifyEmailRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();

        if(!OTP::validate($validated, $validated["otp_code"]))
        {
            $this->logger->warning("Verify Email Failed: Expired or Invalid OTP", ["email" => $user->email]);
            return Response::fail(message: 'Expired or Invalid OTP', status: 400);
        }
        
        $user->markEmailAsVerified();

        $this->logger->info('User Verified Email Successfully', ['user_id' => $user->id,]);
        return Response::success('Email Verified Successfully');
        
    }
    
}
