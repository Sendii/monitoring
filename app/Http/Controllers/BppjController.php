<?php

namespace App\Http\Controllers;
use \App\pbbj;
use \App\unitkerja;
use \App\pengadaan;
use \App\barang;
use Session;

use Illuminate\Http\Request;

class BppjController extends Controller
{

    public function addPpbj() {
        $data['ppbjadd']     = pbbj::all();
        $data['unitkerja'] = unitkerja::get();
        $data['pengadaan'] = pengadaan::get();
        return view('ppbj.add')->with($data);
    }
    
    public function allPpbj() {
    	$data['ppbjall'] = pbbj::with('Barang')->orderBy('id', 'desc')->paginate(3);
        $data['barangall'] = barang::get();

        // return $data;


        return view('ppbj.all')->with($data);
    }

    public function savePpbj(Request $r) 
    {        
        // $this->validate($r, [
        //     'kodePj' => 'min:3|max:4',
        //     'no_regis_umum' => 'numeric|min:9|max:10',
        //     'no_ppbj' => 'numeric|min:4|max4'
        //     ]);


        $data['ppbjadd'] = pbbj::where('id');
        $data['barang'] = barang::where('id_barang');

        $new = new pbbj;
        $new->kodePj = $r->input('kodePj');
        $new->no_regis_umum = $r->input('noregisumum');
        $new->id_unit = $r->input('id_unit');
        $new->tgl_regis_umum = $r->input('tglregisumum');
        $new->no_ppbj = $r->input('noppbj');
        $new->tgl_permintaan_ppbj = $r->input('tglpermintaanPpbj');
        $new->tgl_dibutuhkan_ppbj = $r->input('tgldibutuhkanPpbj');
        $new->id_pengadaan = $r->input('jenispengadaan'); 

        $new->save();

        for ($i=0; $i < $r['row']; $i++)
        {
           $new2 = new barang;
           $new2->id = $new->id;
           $new2->banyak_brg = $r->input('row');
           $new2->nama_barang= $r['nama'][$i];
           $new2->jumlah_brg= $r['qty'][$i]; 
           $new2->harga_brg= $r['harga'][$i]; 
           $new2->total_brg= $r['total'][$i];  
           $new2->hargatotal_brg= $r->input('subtotal'); 
           $new2->save();
       }  

       Session::flash('successaddPpbj', 'Anda telah berhasil menambahkan Data.');
       return redirect()->route('allPpbj');
   }

   public function editPpbj($id) {
    $data['ppbjedit'] = pbbj::find($id);
    $data['editbarang'] = barang::find($id);
    $data['unitkerja'] = unitkerja::get();
    $data['pengadaan'] = pengadaan::get();
        // $data['unit'] = \App\unitkerja::where('id_unit', $id)->first();
    return view('ppbj.edit')->with($data);
}

public function updatePpbj(Request $r) {
    $edit = pbbj::find($r->input('id'));

    $edit->kodePj = $r->input('kodePj');
    $edit->no_regis_umum = $r->input('noregisumum');
    $edit->id_unit = $r->input('id_unit');
    $edit->tgl_regis_umum = $r->input('tglregisumum');
    $edit->no_ppbj = $r->input('noppbj');
    $edit->tgl_permintaan_ppbj = $r->input('tglpermintaanppbj');
    $edit->tgl_dibutuhkan_ppbj = $r->input('tgldibutuhkanppbj');

    $edit->save();

    $edit2 = barang::find($r->input('id_barang'));

        // $bppj = \App\pbbj::find($r->input('id'));
        // $total = $r->input('hargabarang') + $r->input('jumlahbarang');
        // $bppj->hargatotal_brg = $total;
        // $bppj->save();

    return redirect()->route('allPpbj');
    }
}
