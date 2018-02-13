<?php

namespace App\Http\Controllers;
use \App\pegawai;
use \App\pbbj;
use \App\unitkerja;
use \App\jabatan;
use \App\pengadaan;

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

    public function editassignmentPpbj($id) 
    {
    	$data['ppbjassignmentEdit'] = pbbj::find($id);
        $data['unitkerja'] = unitkerja::get();
        $data['pegawai'] = pegawai::get();
        $data['pengadaan'] = pengadaan::get();
        // $data['unit'] = \App\unitkerja::where('id_unit', $id)->first();
        return view('kasubag.edit')->with($data);
    }

    public function updateassignmentPpbj(Request $r)
    {
        $edit = pbbj::find($r->input('id'));

        $edit->kodePj = $r->input('kodePj');
        $edit->no_regis_umum = $r->input('noregisumum');
        $edit->id_unit = $r->input('id_unit');
        $edit->id_pegawai = $r->input('id_pegawai');
        $edit->tgl_regis_umum = $r->input('tglregisumum');
        $edit->no_ppbj = $r->input('noppbj');
        $edit->tgl_permintaan_ppbj = $r->input('tglpermintaanppbj');
        $edit->tgl_dibutuhkan_ppbj = $r->input('tgldibutuhkanppbj');
        $edit->jenis_pengadaan = $r->input('jenispengadaan');
        $edit->banyak_brg = $r->input('banyakbarang');
        $edit->nama_barang = $r->input('namabarang');
        $edit->harga_brg = $r->input('hargabarang');
        $edit->jumlah_brg = $r->input('jumlahbarang');
        $edit->hargatotal_brg = $r->input('hargabarang') * $r->input('jumlahbarang');
        $edit->save();

        // $bppj = \App\pbbj::find($r->input('id'));
        // $total = $r->input('hargabarang') + $r->input('jumlahbarang');
        // $bppj->hargatotal_brg = $total;
        // $bppj->save();

        return redirect()->route('receivePpbj');
    }
}
