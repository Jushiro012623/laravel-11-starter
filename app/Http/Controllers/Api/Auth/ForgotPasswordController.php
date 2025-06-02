<?php

namespace App\Http\Controllers\Api\Auth;

use App\Facades\OTP;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgotPasswordOTPRequest;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Jobs\MailJob;
use App\Mail\ResetPassword;
use App\Repositories\V1\UserRepository;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;

class ForgotPasswordController extends Controller
{
    /**
     * Whether to return the OTP in the response (local dev mode).
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
     * Handle forgot password request by generating and sending an OTP.
     *
     * @param ForgotPasswordOTPRequest $request
     * @return JsonResponse
     */
    public function forgotPasswordOTP(ForgotPasswordOTPRequest $request): JsonResponse
    {
        $email = $request->validated("email");

        $otp = OTP::salt($email)->generate();

        // Dispatch mail job to send the OTP
        MailJob::dispatch($email, new ResetPassword($otp));

        // Hide the actual OTP code unless in local dev mode
        $otp["otp_code"] = $this->inLocalState ? $otp["otp_code"] : null;

        $this->logger->info("Reset Password OTP Was Sent", ["user_email" => $email]);

        return Response::success("Forgot Password OTP Sent Successfully", $otp);
    }

    /**
     * Handle password reset with OTP validation.
     *
     * @param ForgotPasswordRequest $request
     * @return JsonResponse
     */
    public function resetPassword(ForgotPasswordRequest $request): JsonResponse
    {
        $validated = $request->validated();

        // Validate OTP
        if (!OTP::salt($validated['email'])->validate($validated)) {
            $this->logger->warning("Reset Password Failed: Expired or Invalid OTP", [
                "email" => $validated["email"]
            ]);

            return Response::fail(message: "Expired or Invalid OTP", status: 400);
        }

        // Update the user's password
        $user = $this->userRepository->getUserByEmail($validated["email"]);
        $this->userRepository->updateUserPassword($validated["password"], $user);

        $this->logger->info("User Forgotted Password Changed Successfully", ["user_id" => $user->id]);

        return Response::success("Password Changed Successfully");
    }
}
