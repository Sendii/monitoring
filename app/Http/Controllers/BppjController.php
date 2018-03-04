<?php

namespace App\Http\Controllers;
use \App\pbbj;
use \App\unitkerja;
use \App\pengadaan;
use \App\barang;
use Session;
use Alert;

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
        //     ]);//


        $data['ppbjadd'] = pbbj::where('id');
        $data['barang'] = barang::where('id_barang');

        $new = new pbbj;
        $new->kodePj = $r->input('kodePj');
        $new->no_regis_umum = $r->input('noregisumum');
        $new->id_unit = $r->input('id_unit');
        $new->tgl_regis_umum = date($r->input('tglregisumum'));
        $new->no_ppbj = $r->input('noppbj');
        $new->tgl_permintaan_ppbj = date($r->input('tglpermintaanPpbj'));
        $new->tgl_dibutuhkan_ppbj = date($r->input('tgldibutuhkanPpbj'));
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
           Alert::success('Data Ppbj baru telah ditambahkan', 'Berhasil!')->autoclose(1300);
           $new2->save();
       }  

       
       // Session::flash('successaddPpbj', 'Anda telah berhasil menambahkan Data.');
       return redirect()->route('allPpbj');
   }

   public function editPpbj($id) {
      $data['ppbjedit'] = pbbj::find($id);
      // $data['editbarang'] = pbbj::with('Barang')->orderBy('id', 'desc')->find($id);
      $data['barang'] = barang::find($id);
      $data['unitkerja'] = unitkerja::get();
      $data['pengadaan'] = pengadaan::get();
      $data['jumlah'] = barang::where('id', '=', $id)->count();
      $data['barangnya'] = barang::where('id', '=', $id)->get();
      $data['id'] = $id;

      // return $data['editbarang'];    
      return view('ppbj.edit')->with($data);
}

    public function updatePpbj(Request $r) {
      $edit = pbbj::find($r->input('id'));

      $edit->kodePj = $r->input('kodePj');
      $edit->no_regis_umum = $r->input('noregisumum');
      $edit->id_unit = $r->input('id_unit');
      $edit->id_pengadaan = $r->input('jenispengadaan');  
      $edit->tgl_regis_umum = $r->input('tglregisumum');
      $edit->no_ppbj = $r->input('noppbj');
      $edit->tgl_permintaan_ppbj = $r->input('tglpermintaanppbj');
      $edit->tgl_dibutuhkan_ppbj = $r->input('tgldibutuhkanppbj');

      $edit->save();

      $edit2 = barang::where($r->input('id_barang'));
      $barangnya = barang::where('id', '=', $r->input('id'))->get();
      foreach ($barangnya as $barang) {
           $edit2->id = $edit2->id;
           $edit2->banyak_brg = $r->input('row');
           $edit2->nama_barang= $r['nama'][$i];
           $edit2->jumlah_brg= $r['qty'][$i]; 
           $edit2->harga_brg= $r['harga'][$i]; 
           $edit2->total_brg= $r['total'][$i];  
           $edit2->hargatotal_brg= $r->input('subtotal'); 
           Alert::success('Data Ppbj baru telah ditambahkan', 'Berhasil!')->autoclose(1300);
           $edit2->save();
      }
      // for ($i=0; $i < $r['row']; $i++)
      //   {           
      //      $edit2->id = $edit2->id;
      //      $edit2->banyak_brg = $r->input('row');
      //      $edit2->nama_barang= $r['nama'][$i];
      //      $edit2->jumlah_brg= $r['qty'][$i]; 
      //      $edit2->harga_brg= $r['harga'][$i]; 
      //      $edit2->total_brg= $r['total'][$i];  
      //      $edit2->hargatotal_brg= $r->input('subtotal'); 
      //      Alert::success('Data Ppbj baru telah ditambahkan', 'Berhasil!')->autoclose(1300);
      //      $edit2->save();
      //  }

      // Alert::success('Data Ppbj telah diEdit', 'Berhasil!')->autoclose(1300);
      return redirect()->route('allPpbj');
      }

      public function delete_ppbj($id)
    {
        pbbj::find($id)->delete();

        Alert::success('Data Ppbj telah dihapus', 'Berhasil!')->autoclose(1300);
        return redirect()->route('allPpbj');
    }
}
