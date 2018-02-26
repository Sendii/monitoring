<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    //1=Kasubag, 2=ADMIN, 3=Kadiv 
    {
        if (Auth::user() &&  Auth::user()->akses == 'Kadiv') {
            return $next($request);
        }

        return redirect('/');
    }
}
