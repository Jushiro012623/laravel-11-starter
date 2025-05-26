<?php

namespace App\Http\Middleware\V1;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = null): Response
    {
        try{
            if (! $token = JWTAuth::getToken()) {
                return HttpResponse::fail("Token not provided", status: 401);
            }

            
            if (! $user = JWTAuth::setToken($token)->authenticate()) {
                return HttpResponse::fail("No User Found", status: 401);
            }

            // $decodedToken = JWTAuth::getPayload($token);

            // if ($role && $user->userRole->name !== $role && $decodedToken['data']['role'] !== $role) {
            //     return HttpResponse::fail("Unauthorized Access", status: 401);
            // }
            
            return $next($request);

        } catch (TokenExpiredException $e) {

            return HttpResponse::error("Token has Expired", $e->getTrace(), 401);

        } catch (TokenInvalidException $e) {

            return HttpResponse::error("Invalid Token", $e->getTrace(), 401);

        } catch (\Exception $e) {

            throw $e;
            
        } 
    }
}
