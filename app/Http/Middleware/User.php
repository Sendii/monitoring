<?php

namespace App\Http\Middleware;

use Closure;
use Auth;   

class User
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
        if (Auth::user() &&  Auth::user()->akses == 'Kasubag') {
            return $next($request);
     }elseif(Auth::user() &&  Auth::user()->akses == 'Admin') {
        return redirect('admin');
     }elseif(Auth::user() &&  Auth::user()->akses == 'Kadiv') {
        return redirect('monitoring');
     }

    return redirect('/userspeople');
    }
}
