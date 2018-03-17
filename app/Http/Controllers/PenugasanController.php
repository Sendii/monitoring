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
        $data['receiveallPpbj'] = pbbj::orderBy('created_at', 'DESC')->paginate(10);
        $data['prosespengadaan'] = prosespengadaan::get();
        $data['unitkerja'] = unitkerja::get();
        return view('kasubag.all')->with($data);
    }

    public function editassignmentPpbj($id) 
    {
       $data['ppbjassignmentEdit'] = pbbj::find($id);
       $data['unitkerja'] = unitkerja::get();
       $data['cekpegawai'] = pbbj::get();
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
       return view('kasubag.edit')->with($data);
   }

   public function updateassignmentPpbj(Request $r, $id)
   {        
    if (prosespengadaan::where('id_ppbj', '=', $id)->exists()) {
        $idproses = prosespengadaan::where('id_ppbj', '=', $id)->value('id');
        $newproses = pbbj::find($id);
        $table = prosespengadaan::find($idproses);
        $table->id_pegawai = $r->input('id_pegawai');
        if($r->input('p_tglspph') == ""){
            $table->tgl_spph = "";
        }else{
            $table->tgl_spph = $r->input('p_tglspph');
        }
        if($r->input('p_nospph') == "") {
            $table->no_spph = "";
        }else{
            $table->no_spph = $r->input('p_nospph');
            $table->selesaispph = date('d-m-Y');
        }

        if($r->input('p_tgletp') == "" ) {
            $table->tgl_etp = "";
        }else{
            $table->tgl_etp = $r->input('p_tgletp');
            $table->selesaietp = date('d-m-Y');
        }

        if($r->input('p_tglpmn') == "" ) {
            $table->tgl_pmn = "";
        }else{
            $table->tgl_pmn = date($r->input('p_tglpmn'));
        }if($r->input('p_nopmn') == "") {
            $table->no_pmn = "";
        }
        else{
            $table->no_pmn = $r->input('p_nopmn');
            $table->selesaipmn = date('d-m-Y');
        }

        if($r->input('p_tglkon') == "") {
            $table->tgl_kon = "";
        }else{
            $table->tgl_kon = date($r->input('p_tglkon'));
        }if($r->input('p_nokon') == "") {
            $table->no_kon = "";
        }else{
            $table->no_kon = $r->input('p_nokon');
            $table->selesaikon = date('d-m-Y');
        }        
        $table->save();

        $newproses->id_pegawai = $r->input('id_pegawai'); //id prosespengadaan == id ppbj 
        $newproses->save();

        Alert::success('Data Ppbj telah ditugaskan22', 'Berhasil!')->autoclose(1300);
        return redirect()->route('receivePpbj');
    }
    else {
        $newprosespengadaan = new prosespengadaan;
        // $editprosespengadaan = prosespengadaan::find($r->input('id_pemroses'));

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
        $newprosespengadaan->id_ppbj = $newproses->id; //id prosespengadaan == id ppbj 
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
}
