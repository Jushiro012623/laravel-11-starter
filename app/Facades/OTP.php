<?php

namespace App\Facades;

use App\Services\V1\OTPService;
use Illuminate\Support\Facades\Facade;

class OTP extends Facade
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    protected static function getFacadeAccessor() {
        return OTPService::class;
    }
    
}
