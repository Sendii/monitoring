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

        $new = new prosespengadaan;

        $new->id_pegawai = $r->input('id_pegawai');

        if($r->input('p_tglspph') == "" && ($r->input('p_nospph') == "")) {
            $new->tgl_spph = "Kosong..";
            $new->no_spph = "Kosong...";
        }else{
            $new->tgl_spph = $r->input('p_tglspph');
            $new->no_spph = $r->input('p_nospph');
            $new->selesaispph = date('Y-m-d H:i:s');
        }

        if($r->input('p_tgletp') == "" ) {
            $new->tgl_etp = "2000-01-01";
        }else{
            $new->tgl_etp = $r->input('p_tgletp');
            $new->selesaietp = date('Y-m-d H:i:s');
        }

        if($r->input('p_tglpmn') == "" && ($r->input('p_nopmn') == "")) {
            $new->tgl_pmn = "2000-01-01";
            $new->no_pmn = "Kosong...";
        }else{

            $new->tgl_pmn = $r->input('p_tglpmn');
            $new->no_pmn = $r->input('p_nopmn');
            $new->selesaipmn = date('Y-m-d H:i:s');
        }

        if($r->input('p_tglkon') == "" && ($r->input('p_nokon') == "")) {
            $new->tgl_kon = "2000-01-01";
            $new->no_kon = "Kosong...";
        }else{
            $new->tgl_kon = $r->input('p_tglkon');
            $new->no_kon = $r->input('p_nokon');
            $new->selesaikon = date('Y-m-d H:i:s');
        }

        $new->save();

        

        return redirect()->route('receivePpbj');
    }
}
