<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (\Illuminate\Support\Facades\Auth::guard('api')->guest()){
            return  response()->json([
                'status'=>false,
                'message'=>'unauthorized'
            ],401);
        }
        return $next($request);
    }
}
