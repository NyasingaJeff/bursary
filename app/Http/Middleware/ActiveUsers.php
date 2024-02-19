<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ActiveUsers
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
        if( auth()->user()->status != 'active'){
            return back()->with("fail","Your Account is ".ucfirst(auth()->user()->accountStatus." Please contact the Adminstrator For assistance,"));
        }
        return $next($request);
    }
}
