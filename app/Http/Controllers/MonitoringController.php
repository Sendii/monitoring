<?php

namespace App\Http\Controllers;
use \App\pegawai;
use \App\pbbj;
use \App\prosespengadaan;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
     public function allMonitoring() {
    	$data['allMonitor'] = prosespengadaan::orderBy('id_prosespengadaan', 'desc')->paginate(3);
    	return view('monitoring')->with($data);
    }
}
