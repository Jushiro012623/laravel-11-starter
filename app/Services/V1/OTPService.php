<?php

namespace App\Services\V1;

use Carbon\Carbon;
use Illuminate\Support\Str;

class OTPService
{
    /**
         * Get current time in Asia/Manila timezone.
         *
         * @return Carbon
    */
    private function getTime(): Carbon
    {
        return Carbon::now("Asia/Manila");
    }

    /**
         * Generate an OTP with metadata.
         *
         * @param  bool   $numeric
         * @param  int    $otpLength
         * @param  string $otpPrefix
         * @return array
    */
    public function generate(bool $numeric = false, int $otpLength = 6, string $otpPrefix = "OTP", $salt = ""): array
    {
        $timeNow = $this->getTime();

        $otpCode = $numeric
            ? str_pad(random_int(0, 10 ** $otpLength - 1), $otpLength, "0", STR_PAD_LEFT)
            : Str::upper(Str::random($otpLength));

        $otpReference = Str::upper($otpPrefix . $timeNow->format("YmdHis") . Str::random($otpLength));
        
        $data = ["otp_reference_no" => $otpReference, "otp_code" => $otpCode,"otp_time" => $timeNow->timestamp];

        $data["otp_hd"] = $this->hash($data, $salt);

        return $data;
    }

    /**
         * Create a SHA-1 hash from OTP data.
         *
         * @param  array $otp
         * @param  string $salt
         * @return string
    */
    public function hash(array $otp, $salt = ""): string
    {
        return sha1($otp["otp_reference_no"] . $otp["otp_code"] . $otp["otp_time"]. $salt);
    }

    /**
         * Validate an OTP code.
         *
         * @param  array  $otp
         * @param  string $inputCode
         * @param  int    $expiration
         * @return bool
    */
    public function validate(array $otp, string $inputCode, int $expiration = 300, $salt = ""): bool
    {
        if (!$this->verifyHash($otp, $salt)) {
            return false;
        }

        if ($this->isExpired($otp, $expiration)) {
            return false;
        }

        return $otp["otp_code"] === $inputCode;
    }

    /**
         * Validate if OTP is expired.
         *
         * @param  array  $otp
         * @param  int    $expiration
         * @return bool
         * @return true if expired.
    */
    public function isExpired(array $otp, int $expiration = 300): bool
    {
        $expiry = Carbon::createFromTimestamp($otp["otp_time"])->addSeconds($expiration);
        return $this->getTime()->greaterThan($expiry);
    }

    /**
         * Validate OTP hash.
         *
         * @param  array  $otp
         * @return bool
         * @return false if hash is not valid.
    */
    public function verifyHash(array $otp, $salt = ""): bool
    {
        return hash_equals($this->hash($otp, $salt), $otp["otp_hd"]);
    }


}
