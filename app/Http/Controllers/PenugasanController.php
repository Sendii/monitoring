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
    public function receivePpbj() {
        $data['receiveallPpbj'] = pbbj::paginate(3);
        $data['unitkerja'] = unitkerja::get();
        return view('kasubag.all')->with($data);
    }

    public function editassignmentPpbj($id) 
    {
    	$data['ppbjassignmentEdit'] = pbbj::find($id);
        $data['unitkerja'] = unitkerja::get();
        $data['pegawai'] = pegawai::get();
        $data['pengadaan'] = pengadaan::get();
        $data['prosespengadaan'] = prosespengadaan::all();
        $data['jumlah'] = barang::where('id', '=', $id)->count();
        $data['barang'] = barang::find($id);
        $data['barangnya'] = barang::where('id', '=', $id)->get();
        $data['id'] = $id;
        // $data['unit'] = \App\unitkerja::where('id_unit', $id)->first();
        return view('kasubag.edit')->with($data);
    }

    public function updateassignmentPpbj(Request $r)
    {
        // $editprosespengadaan = prosespengadaan::where('id_prosespengadaan')->get();
        // if($editprosespengadaan->count() > 0) 
        //     //JIKA data sudah ada, akan edit data
        // {
        //     $editproses = prosespengadaan::find($r->input('id'));

        //     $editproses->id_pegawai = $r->input('id_pegawai');
        //     $editproses->tgl_spph = $r->input('p_tglspph');
        //     $editproses->no_spph = $r->input('p_nospph');
        //     $editproses->tgl_etp = $r->input('p_tgletp');
        //     $editproses->tgl_pmn = $r->input('p_tglpmn');
        //     $editproses->no_pmn = $r->input('p_nopmn');
        //     $editproses->tgl_kon = $r->input('p_tglkon');
        //     $editproses->no_kon = $r->input('p_nokon');
        //     $editproses->save();
        // }else
        //kalau data bellum ada akan nambah data baru
        $newprosespengadaan = new prosespengadaan;
        $newproses = pbbj::find($r->input('id'));
        $newprosespengadaan->id_pegawai = $r->input('id_pegawai');
        if($r->input('p_tglspph') == ""){
            $newprosespengadaan->tgl_spph = "Belum Terselesaikan";
        }else{
            $newprosespengadaan->tgl_spph = $r->input('p_tglspph');
        }
        if($r->input('p_nospph') == "") {
            $newprosespengadaan->no_spph = "Belum Terselesaikan";
        }else{
            $newprosespengadaan->no_spph = $r->input('p_nospph');
            $newprosespengadaan->selesaispph = date('Y-m-d H:i:s');
        }

        if($r->input('p_tgletp') == "" ) {
            $newprosespengadaan->tgl_etp = "Belum Terselesaikan";
        }else{
            $newprosespengadaan->tgl_etp = $r->input('p_tgletp');
            $newprosespengadaan->selesaietp = date('Y-m-d H:i:s');
        }

        if($r->input('p_tglpmn') == "" ) {
            $newprosespengadaan->tgl_pmn = "Belum Terselesaikan";
        }else{
            $newprosespengadaan->tgl_pmn = date($r->input('p_tglpmn'));
        }if($r->input('p_nopmn') == "") {
            $newprosespengadaan->no_pmn = "Belum Terselesaikan";
        }
        else{
            $newprosespengadaan->no_pmn = $r->input('p_nopmn');
            $newprosespengadaan->selesaipmn = date('Y-m-d H:i:s');
        }

        if($r->input('p_tglkon') == "") {
            $newprosespengadaan->tgl_kon = "Belum Terselesaikan";
        }else{
            $newprosespengadaan->tgl_kon = date($r->input('p_tglkon'));
        }if($r->input('p_nokon') == "") {
            $newprosespengadaan->no_kon = "Belum Terselesaikan";
        }else{
            $newprosespengadaan->no_kon = $r->input('p_nokon');
            $newprosespengadaan->selesaikon = date('Y-m-d H:i:s');
        }
        $newprosespengadaan->id = $newproses->id; //id prosespengadaan == id ppbj 
        $newprosespengadaan->save();



        $data = $r->except(['_token']); 
      // return dd($data);

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

        
        $newproses->id_pegawai = $newprosespengadaan->id_pegawai;
        $newproses->save();
        Alert::success('Data Ppbj telah ditugaskan22', 'Berhasil!')->autoclose(1300);
        return redirect()->route('receivePpbj');

    }
}
