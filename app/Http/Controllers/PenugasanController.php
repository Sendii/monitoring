<?php

namespace App\Http\Controllers;
use \App\pbbj;
use \App\unitkerja;
use \App\pegawai;
use \App\pengadaan;
use \App\prosespengadaan;
use Alert;

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
        // $data['unit'] = \App\unitkerja::where('id_unit', $id)->first();
        return view('kasubag.edit')->with($data);
    }

    public function updateassignmentPpbj(Request $r)
    {
        //Penugasan
        $data['prosespengadaan'] = prosespengadaan::where('id');

        
        if (prosespengadaan::where('id_prosespengadaan', '=', $id_prosespengadaan)->Exists()) {
            //DATA ADA
            $editproses = prosespengadaan::find($r->input('id'));

            $editproses->id_pegawai = $r->input('id_pegawai');
            if( date($r->input('p_tglspph')) == "" && ($r->input('p_nospph') == "")) {
                $editproses->tgl_spph = "Kosong..";
                $editproses->no_spph = "Kosong...";
            }else{
                $editproses->tgl_spph = date($r->input('p_tglspph'));
                $editproses->no_spph = $r->input('p_nospph');
                $editproses->selesaispph = date('Y-m-d H:i:s');
            }

            if(date($r->input('p_tgletp')) == "" ) {
                $editproses->tgl_etp = "2000-01-01";
            }else{
                $editproses->tgl_etp = date($r->input('p_tgletp'));
                $editproses->selesaietp = date('Y-m-d H:i:s');
            }

            if(date($r->input('p_tglpmn')) == "" && ($r->input('p_nopmn') == "")) {
                $editproses->tgl_pmn = "2000-01-01";
                $new->no_pmn = "Kosong...";
            }else{

                $editproses->tgl_pmn = date($r->input('p_tglpmn'));
                $editproses->no_pmn = $r->input('p_nopmn');
                $editproses->selesaipmn = date('Y-m-d H:i:s');
            }

            if(date($r->input('p_tglkon')) == "" && ($r->input('p_nokon') == "")) {
                $editproses->tgl_kon = "2000-01-01";
                $editproses->no_kon = "Kosong...";
            }else{
                $editproses->tgl_kon = date($r->input('p_tglkon'));
                $editproses->no_kon = $r->input('p_nokon');
                $editproses->selesaikon = date('Y-m-d H:i:s');
            }

            $newproses->save();

            $newproses = pbbj::find($r->input('id'));
            $newproses->id_pegawai = $editproses->id_pegawai;
            $newproses->save();
        Alert::success('Data Ppbj telah ditugaskan22', 'Berhasil!')->autoclose(1300);
        }else{
            $new = new prosespengadaan;
            $new->id_pegawai = $r->input('id_pegawai');

            if(date($r->input('p_tglspph')) == "" && (date($r->input('p_nospph')) == "")) {
                $new->tgl_spph = "Kosong..";
                $new->no_spph = "Kosong...";
            }else{
                $new->tgl_spph = date($r->input('p_tglspph'));
                $new->no_spph = $r->input('p_nospph');
                $new->selesaispph = date('Y-m-d H:i:s');
            }

            if(date($r->input('p_tgletp')) == "" ) {
                $new->tgl_etp = "2000-01-01";
            }else{
                $new->tgl_etp = $r->input('p_tgletp');
                $new->selesaietp = date('Y-m-d H:i:s');
            }

            if(date($r->input('p_tglpmn')) == "" && ($r->input('p_nopmn') == "")) {
                $new->tgl_pmn = "2000-01-01";
                $new->no_pmn = "Kosong...";
            }else{

                $new->tgl_pmn = date($r->input('p_tglpmn'));
                $new->no_pmn = $r->input('p_nopmn');
                $new->selesaipmn = date('Y-m-d H:i:s');
            }

            if(date($r->input('p_tglkon')) == "" && ($r->input('p_nokon') == "")) {
                $new->tgl_kon = "2000-01-01";
                $new->no_kon = "Kosong...";
            }else{
                $new->tgl_kon = date($r->input('p_tglkon'));
                $new->no_kon = $r->input('p_nokon');
                $new->selesaikon = date('Y-m-d H:i:s');
            }

            $new->save();

            $edit2 = pbbj::find($r->input('id'));
            $edit2->id_pegawai = $new->id_pegawai;
            $edit2->save();

        Alert::success('Data Ppbj telah ditugaskan1', 'Berhasil!')->autoclose(1300);
        }
        return redirect()->route('receivePpbj');
        
    }
}
