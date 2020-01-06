<?php

namespace App\Http\Middleware;

use Closure;

class Exchange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = env('EXCHANGE_KEY', null);
        $requestToken = $request->header('key');
        if($token == $requestToken) {
            return $next($request);
        } else {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    }
}
