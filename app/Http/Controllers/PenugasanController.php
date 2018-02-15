<?php

namespace App\Http\Controllers;
use \App\pbbj;
use \App\unitkerja;
use \App\pegawai;
use \App\pengadaan;
use \App\prosespengadaan;

use Illuminate\Http\Request;

class PenugasanController extends Controller
{
     public function editassignmentPpbj($id) 
    {
    	$data['ppbjassignmentEdit'] = pbbj::find($id);
        $data['unitkerja'] = unitkerja::get();
        $data['pegawai'] = pegawai::get();
        $data['pengadaan'] = pengadaan::get();
        $data['prosespengadaan'] = prosespengadaan::all();
        // $data['unit'] = \App\unitkerja::where('id_unit', $id)->first();
        return view('kasubag.edit')->with($data);
    }

    public function updateassignmentPpbj(Request $r)
    {
        $edit = prosespengadaan::find($r->input('id'));
        // $edit3 = $edit1==$edit2;


        //EDIT PPBJ
        // $edit->kodePj = $r->input('kodePj');
        // $edit->no_regis_umum = $r->input('noregisumum');
        // $edit->id_unit = $r->input('id_unit');
        // $edit->id_pegawai = $r->input('id_pegawai');
        // $edit->tgl_regis_umum = $r->input('tglregisumum');
        // $edit->no_ppbj = $r->input('noppbj');
        // $edit->tgl_permintaan_ppbj = $r->input('tglpermintaanppbj');
        // $edit->tgl_dibutuhkan_ppbj = $r->input('tgldibutuhkanppbj');
        // $edit->jenis_pengadaan = $r->input('jenispengadaan');
        // $edit->banyak_brg = $r->input('banyakbarang');
        // $edit->nama_barang = $r->input('namabarang');
        // $edit->harga_brg = $r->input('hargabarang');
        // $edit->jumlah_brg = $r->input('jumlahbarang');
        // $edit->hargatotal_brg = $r->input('hargabarang') * $r->input('jumlahbarang');

        //Penugasan
        $data['prosespengadaan'] = prosespengadaan::where('id');

        $new = new prosespengadaan;
        $new->id_pegawai = $r->input('id_pegawai');
        $new->tgl_spph = $r->input('p_tglspph');
        $new->no_spph = $r->input('p_nospph');
        $new->tgl_etp = $r->input('p_tgletp');
        $new->tgl_pmn = $r->input('p_tglpmn');
        $new->no_pmn = $r->input('p_nopmn');
        $new->tgl_kon = $r->input('p_tglkon');
        $new->no_kon = $r->input('p_nokon');

        $new->save();
        return redirect()->route('receivePpbj');
    }
}
