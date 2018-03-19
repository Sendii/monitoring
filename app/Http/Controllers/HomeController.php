<?php

namespace App\Http\Controllers;
use \App\User;
use DB;
use Alert;
use \App\logdata;
use Auth;
<<<<<<< HEAD
use \App\pbbj;
use \App\prosespengadaan;

=======
use \App\prosespengadaan;
use \App\pbbj;
>>>>>>> d30bd65151651ec9fa115d80c6de02b840d67963

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $r)
    {
        // $this->middleware('admin');
        // date_default_timezone_set("Asia/Jakarta");
        // //$this->middleware('auth');
        // //echo "<pre>".print_r($_SERVER,1)."</pre>";
        // $log = new logdata();
        // $log->idpengguna = (Auth::check())?Auth::user()->id:0;
        // $log->url = $r->url();;
        // $log->user_agent = $_SERVER['HTTP_USER_AGENT'];
        // $log->ip = $_SERVER['REMOTE_ADDR'];
        // $log->ip_port = isset($_SERVER['REMOTE_PORT'])?$_SERVER['REMOTE_PORT']:"";
        // $log->http_host = isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:"";
        // $log->http_referer = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"";
        // $log->pathinfo = isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:"";
        // $log->save();
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function userpeople()
    {
        return view('user.userpeople');
    }
    
    public function index()
    {
<<<<<<< HEAD
        $data['getkontrak']    = \App\prosespengadaan::get();
        $data['getppbj']       = \App\pbbj::orderBy('updated_at', 'DESC')->paginate(10);
        $total                 = pbbj::count();
        $selesai               = prosespengadaan::whereNotNull('selesaikon')->count();
        $data['selesaiproses'] = prosespengadaan::whereNotNull('selesaikon')->count();
        // $data['presentase']    = ($selesai / $total) * 100;
=======
        $data['getkontrak'] = \App\prosespengadaan::get();
        $data['getppbj'] = \App\pbbj::orderBy('updated_at', 'DESC')->paginate(10);
        $total = pbbj::count();        
        $selesai = prosespengadaan::whereNotNull('selesaikon')->count();
        $data['presentase'] = ($selesai / $total) * 100;        
>>>>>>> d30bd65151651ec9fa115d80c6de02b840d67963
        return view('welcome')->with($data);
    }
    
    public function contactme(Request $r)
    {
        $data['contact'] = \App\contact::where('id_contact');
        
        
        $new          = new \App\contact;
        $new->name    = $r->input('name');
        $new->email   = $r->input('email');
        $new->subject = $r->input('subject');
        $new->message = $r->input('message');
        
        Alert::success('Terima Kasih atas Saran & Masukannya.', 'Berhasil!')->autoclose(1300);
        $new->save();
        
        return redirect('/');
    }
    
    // ----------------URL REDIRECT TO ERROR404------------
    //  public function pagenotfound()
    //  {
    //      return view('503');
    // }
    
    public function alluser()
    {
        $data['user'] = User::paginate('10');
        
        return view('user.all')->with($data);
    }
    
    public function edituser($id)
    {
        $data['edituser'] = user::find($id);
        $data['user']     = user::get();
        
        return view('user.edit')->with($data);
    }
    
    public function updateuser(Request $r)
    {
        $edit = user::find($r->input('id'));
        
        $edit->name  = $r->input('nama');
        $edit->email = $r->input('email');
        $edit->akses = $r->input('hakakses');
        
        Alert::success('Data User website telah diEdit', 'Berhasil!')->autoclose(1300);
        $edit->save();
        return redirect()->route('alluser');
    }
    
    public function profile()
    {
        $data['user'] = user::get();
        
        return view('profile.profile');
    }
}