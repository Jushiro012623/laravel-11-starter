<?php

namespace App\Http\Middleware\V1;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{

            $jwtToken = $request->bearerToken();

            if (!$jwtToken) {
                return $next($request);
            }

            if (!Auth::setToken($jwtToken)->check()) {
                return $next($request);
            }

            return HttpResponse::fail("Unauthorized Access", status: 401);

        }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return $next($request);
            
        }catch (\Exception $e) {
            
            throw $e;
            
        }
    }
}
