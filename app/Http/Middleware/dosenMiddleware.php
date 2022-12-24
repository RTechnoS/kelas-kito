<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class dosenMiddleware
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
        if(auth()->user()->level == 2){
            return $next($request);
        }
        return response()->json(['You do not have permission to access for this page.']);
    }
}
