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
		$data['allMonitor'] = prosespengadaan::orderBy('id', 'desc')->paginate(5);
		return view('kadiv.monitoring')->with($data);
	}

	public function viewAlldata($id) {
		$data['ppbjedit'] = pbbj::find($id);
      // $data['editbarang'] = pbbj::with('Barang')->orderBy('id', 'desc')->find($id);
		$data['barang'] = barang::find($id);
		$data['unitkerja'] = unitkerja::get();
		$data['pengadaan'] = pengadaan::get();
		$data['jumlah'] = barang::where('id', '=', $id)->count();
		$data['barangnya'] = barang::where('id', '=', $id)->get();
		$data['id'] = $id;
		$data['pegawai'] = pegawai::get();
		$data['prosespengadaan'] = prosespengadaan::find($id);

		return view('kadiv.editAll')->with($data);
	}
}
