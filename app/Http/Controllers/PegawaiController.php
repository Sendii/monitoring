<?php

namespace App\Http\Controllers;
use \App\pegawai;
use \App\pbbj;
use \App\unitkerja;
use \App\jabatan;
use \App\pengadaan;
use \App\prosespengadaan;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function addPegawai() 
    {
    	$data['newPegawai'] = pegawai::all();
        $data['jabatan'] = jabatan::get();
    	return view('pegawai.add')->with($data);
    }

    public function allPegawai() 
    {
    	$data['allPegawai'] = pegawai::paginate('5');
        
    	return view('pegawai.all')->with($data);
    }

    public function savePegawai(Request $r)
    {
    	$data['savePegawai'] = pegawai::where('id_unit');

    	$new = new pegawai;

    	$new->namapegawai = $r->input('namapegawai');
        $new->id_jabatan = $r->input('id_jabatan');
    	$new->notelp = $r->input('nomortelepon');

    	$new->save();

    	return redirect()->route('allPegawai');
    }
}
