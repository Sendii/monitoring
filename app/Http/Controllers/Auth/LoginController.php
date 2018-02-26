<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
*/

    use AuthenticatesUsers;

    protected function authenticated()
    {
        if ( Auth::user()->akses=='Kasubag' ) {// do your margic here
            return redirect('receivePpbj');
        }elseif (Auth::user()->akses=='Kadiv') {
            return redirect('monitoring');
        }elseif (Auth::user()->akses=='Admin') {
            return redirect('admin');
        }elseif (Auth::user()->akses=='User') {
            return redirect('/userpeople');            
        }else {
            return redirect('pagenotfound');
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/admin'

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }
}
