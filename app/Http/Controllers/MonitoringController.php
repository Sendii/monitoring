<?php

namespace App\Http\Controllers;
use \App\pegawai;
use \App\pbbj;
use \App\prosespengadaan;
use \App\barang;
use \App\unitkerja;
use \App\pengadaan;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
	public function allMonitoring() {
		$data['allMonitor'] = prosespengadaan::orderBy('updated_at', 'DESC')->paginate(10);
		$data['cekPegawai'] = prosespengadaan::get();

		return view('kadiv.monitoring')->with($data);
	}

	public function viewAlldata($id) {
		$data['ppbjassignmentEdit'] = pbbj::find($id);
       $data['unitkerja'] = unitkerja::get();
       $data['pegawai'] = pegawai::get();
       $data['pengadaan'] = pengadaan::get();
       $idproses = prosespengadaan::where('id_ppbj', '=', $id)->value('id');
       if (!$idproses == null) {
           $data['prosespengadaan'] = prosespengadaan::find($idproses);
       }   
       $data['jumlah'] = barang::where('id', '=', $id)->count();
       $data['barang'] = barang::find($id);
       $data['barangnya'] = barang::where('id', '=', $id)->get();
       $data['id'] = $id;
        // $data['unit'] = \App\unitkerja::where('id_unit', $id)->first();
       return view('kadiv.view')->with($data);
	}
}
