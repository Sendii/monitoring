<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Alert;

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
            Alert::success('Selamat Datang Kasubag.', 'Login Success!')->autoclose(1300);
            return redirect('home');
        }elseif (Auth::user()->akses=='Kadiv') {
            Alert::success('Selamat Datang Kadiv.', 'Login Success!')->autoclose(1300);
            return redirect('home');
        }elseif (Auth::user()->akses=='Admin') {
            Alert::success('Selamat Datang Admin.', 'Login Success!')->autoclose(1300);
            return redirect('home');
        }elseif (Auth::user()->akses=='User') {
            Alert::success('Silakan tunggu konfirmasi dari Admin setelah pendaftaran anda.', 'Login Success!')->autoclose(1300);
            return redirect('/userspeople');            
        }else {
            Alert::error('Halaman Salah.', 'Error!')->autoclose(1300);
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
