<?php

namespace App\Services\V1;

use Carbon\Carbon;
use Illuminate\Support\Str;

class OTPService
{

    private $expiration = 300;
    private $isNumeric = false;
    private $otpLength = 6;
    private $otpPrefix = "OTP";
    private $salt = "";
    private $timezone = 'Asia/Manila';

    public function timezone(string $tz) {
        $this->timezone = $tz;
        return $this;
    }

    public function expiration($expiration) {
        $this->expiration = $expiration;
        return $this;
    }

    public function numeric() {
        $this->isNumeric = true;
        return $this;
    }

    public function length($otpLength) {
        $this->otpLength = $otpLength;
        return $this;
    }

    public function prefix($otpPrefix) {
        $this->otpPrefix = $otpPrefix;
        return $this;
    }

    public function salt($salt) {
        $this->salt = $salt;
        return $this;
    }

    /**
         * Get current time in Asia/Manila timezone.
         *
         * @return Carbon
    */
    private function getTime(): Carbon
    {
        return Carbon::now($this->timezone);
    }

    /**
         * Generate an OTP with metadata.
         *
         * @param  bool   $numeric
         * @param  int    $otpLength
         * @param  string $otpPrefix
         * @return array
    */
    public function generate(): array
    {
        $timeNow = $this->getTime();

        $otpCode = $this->isNumeric
            ? str_pad(random_int(0, 10 ** $this->otpLength - 1), $this->otpLength, "0", STR_PAD_LEFT)
            : Str::upper(Str::random($this->otpLength));

        $otpReference = Str::upper($this->otpPrefix . $timeNow->format("YmdHis") . Str::random($this->otpLength));
        
        $data = ["otp_reference_no" => $otpReference, "otp_code" => $otpCode, "otp_time" => $timeNow->timestamp];

        $data["otp_hd"] = $this->hash($data, $this->salt);

        return $data;
    }

    /**
         * Create a HASH_MAC hash from OTP data.
         *
         * @param  array $otp
         * @param  string $salt
         * @return string
    */
    public function hash(array $otp, string|null $salt = null): string
    {
        $salt ??= $this->salt;
        return hash_hmac('sha256', $otp["otp_reference_no"] . $otp["otp_code"] . $otp["otp_time"], $salt);
    }

    /**
         * Validate an OTP code.
         *
         * @param  array  $otp
         * @param  string $inputCode
         * @param  int    $expiration
         * @return bool
    */
    public function validate(array $otp): bool
    {
        if (!$this->verifyHash($otp, $this->salt)) {
            return false;
        }

        if ($this->isExpired($otp, $this->expiration)) {
            return false;
        }

        return true;
    }

    /**
         * Validate if OTP is expired.
         *
         * @param  array  $otp
         * @param  int    $expiration
         * @return bool
         * @return true if expired.
    */
    public function isExpired(array $otp): bool
    {
        $expiry = Carbon::createFromTimestamp($otp["otp_time"])->addSeconds($this->expiration);
        return $this->getTime()->greaterThan($expiry);
    }

    /**
         * Validate OTP hash.
         *
         * @param  array  $otp
         * @return bool
         * @return false if hash is not valid.
    */
    public function verifyHash(array $otp): bool
    {
        return hash_equals($this->hash($otp, $this->salt), $otp["otp_hd"]);
    }


}
