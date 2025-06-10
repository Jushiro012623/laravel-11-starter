<?php

namespace App\Http\Middleware\V1;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Response as HttpResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifiedUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if(!JWTAuth::user()->hasActiveAddress()){
            return HttpResponse::fail("Access Denied: Provide Delivery Address First", status: 401);   
        }

        if(!JWTAuth::user()->profile()){
            return HttpResponse::fail("Access Denied: Provide Personal Information First", status: 401);   
        }

        if(!JWTAuth::user()->hasVerifiedEmail()){
            return HttpResponse::fail("Access Denied: Verify Email First", status: 401);   
        }

        return $next($request);
    }
}
