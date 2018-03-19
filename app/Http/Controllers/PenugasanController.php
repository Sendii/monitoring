<?php

namespace App\Http\Controllers;
use \App\pbbj;
use \App\unitkerja;
use \App\pegawai;
use \App\pengadaan;
use \App\prosespengadaan;
use Alert;
use DB;
use \App\barang;

use Illuminate\Http\Request;

class PenugasanController extends Controller
{
    public function receivePpbj()
    {
        $data['receiveallPpbj']  = pbbj::orderBy('created_at', 'DESC')->paginate(10);
        $data['prosespengadaan'] = prosespengadaan::get();
        $data['unitkerja']       = unitkerja::get();
        return view('kasubag.all')->with($data);
    }
    
    public function editassignmentPpbj($id)
    {
        $data['ppbjassignmentEdit'] = pbbj::find($id);
        $data['unitkerja']          = unitkerja::get();
        $data['cekpegawai']         = pbbj::get();
        $data['pegawai']            = pegawai::get();
        $data['pengadaan']          = pengadaan::get();
        $idproses                   = prosespengadaan::where('id_ppbj', '=', $id)->value('id');
        if (!$idproses == null) {
            $data['prosespengadaan'] = prosespengadaan::find($idproses);
        }
        $data['jumlah']    = barang::where('id', '=', $id)->count();
        $data['barang']    = barang::find($id);
        $data['barangnya'] = barang::where('id', '=', $id)->get();
        $data['id']        = $id;
        // $data['unit'] = \App\unitkerja::where('id_unit', $id)->first();
        return view('kasubag.edit')->with($data);
    }
    
    public function updateassignmentPpbj(Request $r, $id)
    {
        $idproses  = prosespengadaan::where('id_ppbj', '=', $id)->value('id');
        $newproses = pbbj::find($id);
        $table     = prosespengadaan::find($idproses);
        if ($r->input('id_pegawai') == "Pak Taufiq") {
            $table->id_pegawai = '1';
        } elseif ($r->input('id_pegawai') == "Mba Widiya") {
            $table->id_pegawai = '2';
        } elseif ($r->input('id_pegawai') == "Pak Eko") {
            $table->id_pegawai = '3';
        } elseif ($r->input('id_pegawai') == "Mba Deva") {
            $table->id_pegawai = '4';
        } elseif ($r->input('id_pegawai') == "Pak Iwan") {
            $table->id_pegawai = '5';
        } elseif ($r->input('id_pegawai') == "Pak Makmun") {
            $table->id_pegawai = '6';
        } elseif ($r->input('id_pegawai') == "Bu Sri Adityawati") {
            $table->id_pegawai = '7';
        } elseif ($r->input('id_pegawai') == "Pak Sugiarjo") {
            $table->id_pegawai = '8';
        } elseif ($r->input('id_pegawai') == "Pak Yoni") {
            $table->id_pegawai = '9';
        } elseif ($r->input('id_pegawai') == "Pak Tomi") {
            $table->id_pegawai = '10';
        } else {
            $table->id_pegawai = $r->input('id_pegawai');
        }
        if ($r->input('p_tglspph') == "") {
            $table->tgl_spph = "";
        } else {
            $table->tgl_spph = $r->input('p_tglspph');
        }
        if ($r->input('p_nospph') == "") {
            $table->no_spph = "";
        } else {
            $table->no_spph     = $r->input('p_nospph');
            $table->selesaispph = date('d-m-Y');
        }
        if ($r->input('p_tgletp') == "") {
            $table->tgl_etp = "";
        } else {
            $table->tgl_etp    = $r->input('p_tgletp');
            $table->selesaietp = date('d-m-Y');
        }
        if ($r->input('p_tglpmn') == "") {
            $table->tgl_pmn = "";
        } else {
            $table->tgl_pmn = date($r->input('p_tglpmn'));
        }
        if ($r->input('p_nopmn') == "") {
            $table->no_pmn = "";
        } else {
            $table->no_pmn     = $r->input('p_nopmn');
            $table->selesaipmn = date('d-m-Y');
        }
        if ($r->input('p_tglkon') == "") {
            $table->tgl_kon = "";
        } else {
            $table->tgl_kon = date($r->input('p_tglkon'));
        }
        if ($r->input('p_nokon') == "") {
            $table->no_kon = "";
        } else {
            $table->no_kon     = $r->input('p_nokon');
            $table->selesaikon = date('d-m-Y');
        }
        $table->save();
        
        $newproses->id_pegawai = $table->id_pegawai; //id prosespengadaan == id ppbj 
        $newproses->save();

        $data = $r->except(['_token']);  
        //return dd($data); 
        $row = count($data['id_barang']);
        for ($i=0; $i < $row; $i++) {        
            DB::table('barangs')->where('id_barang', '=', $data['id_barang'][$i])->update([
              'banyak_brg' => $r->input('row'),
              'nama_barang' => $data['nama'][$data['id_barang'][$i]],
              'jumlah_brg' => $data['qty'][$data['id_barang'][$i]],
              'harga_brg' => $data['harga'][$data['id_barang'][$i]],
              'total_brg' => $data['total'][$data['id_barang'][$i]],
              'hargatotal_brg' => $r->input('subtotal')]);
        }
        
        Alert::success('Data Ppbj telah ditugaskan22', 'Berhasil!')->autoclose(1300);
        return redirect()->route('receivePpbj');
    }
}