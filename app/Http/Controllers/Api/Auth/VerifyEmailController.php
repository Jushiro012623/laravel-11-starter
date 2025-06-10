<?php

namespace App\Http\Controllers\Api\Auth;

use App\Facades\OTP;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\VerifyEmailRequest;
use App\Jobs\MailJob;
use App\Mail\EmailVerification;
use App\Repositories\V1\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Response;

/**
 * Handles email verification via OTP.
 */
class VerifyEmailController extends Controller
{   
    /**
     * Whether to expose the OTP code in the response (local dev mode).
     *
     * @var bool
     */
    private bool $inLocalState;

    /**
     * Create a new controller instance.
     *
     * @param Logger $logger
     * @param UserRepository $userRepository
     */
    public function __construct(
        private Logger $logger,
        private UserRepository $userRepository
    ) {
        $this->inLocalState = config("app.ENABLE_OTP_SHOW");
    }

    /**
     * Send an OTP for email verification.
     *      
     * @return JsonResponse
     */
    public function verifyEmailOTP(): JsonResponse              
    {
        $user = request()->user();
        
        if ($user->hasVerifiedEmail()) {
            return Response::fail("This Email is Already Verified", status: 400);
        }           

        $otp = OTP::numeric()->generate();

        MailJob::dispatch($user->email, new EmailVerification($otp));
        
        // Hide OTP in response unless in local dev mode
        $otp["otp_code"] = $this->inLocalState ? $otp["otp_code"] : null;

        $this->logger->info("Email Verification Code Was Sent", [
            "user_email" => $user->email
        ]);

        return Response::success("Verification Code Was Sent Successfully", $otp);
    }

    /**
     * Verify the user's email using the submitted OTP.
     *
     * @param VerifyEmailRequest $request
     * @return JsonResponse
     */
    public function verifyEmail(VerifyEmailRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = $request->user();   

        if (!OTP::validate($validated)) {
            $this->logger->warning("Verify Email Failed: Expired or Invalid OTP", [
                "email" => $user->email
            ]);
            return Response::fail(message: 'Expired or Invalid OTP', status: 400);
        }

        $user->markEmailAsVerified();

        $this->logger->info('User Verified Email Successfully', [
            'user_id' => $user->id
        ]);

        return Response::success('Email Verified Successfully');
    }
}
