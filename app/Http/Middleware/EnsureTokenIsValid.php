<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if ($request->auth_token !== config()->get("services.application.api_secret")) {

            //return json response with error message
            return response()->json([
                'error' => 'Invalid token',
                'token' => $request->auth_token
            ], 401);

        }
 
        return $next($request);
    }
}
