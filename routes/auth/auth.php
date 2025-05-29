<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\RegistrationController;
use App\Http\Controllers\Api\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
    * 
    * AUTH CONTROLLER 
    * 
*/
Route::group([
        "controller" => AuthController::class,
    ], function (){
        Route::post('login', 'login' )->name("login");

        Route::post('me', 'me' )->name("me")->middleware(['jwtAuth']);
        Route::post('logout', 'logout' )->name("logout")->middleware(['jwtAuth']);
        Route::post('refresh', 'refresh' )->name("refresh")->middleware(['jwtAuth']);
    }
);

/*
    * 
    * FORGOT PASSWORD CONTROLLER 
    * 
*/
Route::group([
        "controller" => ForgotPasswordController::class
    ], function (){
        Route::post('forgotPasswordOTP', 'forgotPasswordOTP' )->name("forgotPasswordOTP");
        Route::post('resetPassword', 'resetPassword' )->name("resetPassword");    
    }
);

/*
    * 
    * EMAIL VERIFICATION CONTROLLER 
    * 
*/

Route::group([
        "controller" => VerifyEmailController::class,
        "middleware" => ['jwtAuth']
    ], function (){
        Route::post('verifyEmailOTP', 'verifyEmailOTP' )->name("verifyEmailOTP");
        Route::post('verifyEmail', 'verifyEmail' )->name("verifyEmail");
    }
);

Route::post('register', RegistrationController::class)->name("register")->middleware(['guestUser']);
