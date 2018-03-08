<?php

namespace App\Http\Controllers;
use \App\User;
use DB;
use Alert;
use \App\logdata;
use Auth;

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
        date_default_timezone_set("Asia/Jakarta");
        //$this->middleware('auth');
        //echo "<pre>".print_r($_SERVER,1)."</pre>";
        $log = new logdata();
        $log->idpengguna = (Auth::check())?Auth::user()->id:0;
        $log->url = $r->url();;
        $log->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $log->ip = $_SERVER['REMOTE_ADDR'];
        $log->ip_port = isset($_SERVER['REMOTE_PORT'])?$_SERVER['REMOTE_PORT']:"";
        $log->http_host = isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:"";
        $log->http_referer = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"";
        $log->pathinfo = isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:"";
        $log->save();
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

    // public function search(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         $output = "";
    //         $ppbjs = DB::table('pbbjs')->where('kodePj', 'LIKE', '%'.$request->search.'%')
    //         ->orWhere('no_regis_umum', 'LIKE', '%'.$request->search.'%')->get();
    //         if($ppbjs)
    //         {
    //             foreach ($ppbjs as $key => $ppbj) {
    //                 $output.='<tr>'.
    //                 '<td>'.$ppbj->kodePj.'</td>'.
    //                 '<td>'.$ppbj->no_regis_umum.'</td>'.
    //                 '<td>'.$ppbj->tgl_regis_umum.'</td>'.
    //                 '<td>'.$ppbj->no_ppbj.'</td>'.
    //                 '<td>'.$ppbj->tgl_permintaan_ppbj.'</td>'.
    //                 '<td>'.$ppbj->tgl_dibutuhkan_ppbj.'</td>'.
    //                 '<td>'.$ppbj->id_pengadaan.'</td>'.
    //                 '<td>'.$ppbj->id_unit.'</td>'.
    //                 '</tr>';
    //             }
    //             return Response($output);
    //         }
    //     }
    // }

    public function index()
    {
        return view('home');
    }

    public function contactme(Request $r)
    {
        $this->validate($r, [
            'g-recaptcha-response' => 'required|captcha'
        ]);
        
        $data['contact'] = \App\contact::where('id_contact');


        $new = new \App\contact;
        $new->name = $r->input('name');
        $new->email = $r->input('email');
        $new->subject = $r->input('subject');
        $new->message = $r->input('message');

        $new->save();

        return redirect('/');
    }

    // ----------------URL REDIRECT TO ERROR404------------
    //  public function pagenotfound()
    //  {
    //      return view('503');
    // }

    public function alluser(){
        $data['user'] = User::paginate('4');

        Alert::success('Data User website baru telah ditambahkan', 'Berhasil!')->autoclose(1300);
        return view('user.all')->with($data);
    }

    public function edituser($id) {
        $data['edituser'] = user::find($id);
        $data['user'] = user::get();

        return view('user.edit')->with($data);
    }

    public function updateuser(Request $r) {
        $edit = user::find($r->input('id'));

        $edit->name = $r->input('nama');
        $edit->email = $r->input('email');
        $edit->akses = $r->input('hakakses');

        $edit->save();
        Alert::success('Data User website telah diEdit', 'Berhasil!')->autoclose(1300);
        return redirect()->route('alluser');
    }
}