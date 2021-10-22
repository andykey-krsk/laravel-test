<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MylistValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->json()->count() < 5){
            return response()->json("В списке меньше пяти записей");
        }

        return $next($request);
    }
}
