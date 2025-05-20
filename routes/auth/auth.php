<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
    * 
    * AUTH CONTROLLER 
    * 
*/
Route::group(["controller" => AuthController::class], function ($router){
    $router->post('login', 'login' )->name("login");
    $router->post('me', 'me' )->name("me");
    $router->post('logout', 'logout' )->name("logout");
    $router->post('refresh', 'refresh' )->name("refresh");
});

/*
    * 
    * FORGOT PASSWORD CONTROLLER 
    * 
*/
Route::group(["controller" => ForgotPasswordController::class], function ($router){
    $router->post('forgotPasswordOTP', 'forgotPasswordOTP' )->name("forgotPasswordOTP");
    $router->post('resetPassword', 'resetPassword' )->name("resetPassword");
});
/*
    * 
    * EMAIL VERIFICATION CONTROLLER 
    * 
*/

Route::group(["controller" => VerifyEmailController::class], function ($router){
    $router->post('verifyEmailOTP', 'verifyEmailOTP' )->name("verifyEmailOTP");
    $router->post('verifyEmail', 'verifyEmail' )->name("verifyEmail");
});

    
