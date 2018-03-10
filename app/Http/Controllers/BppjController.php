<?php

namespace App\Http\Controllers;
use \App\pbbj;
use \App\unitkerja;
use \App\pengadaan;
use \App\barang;
use Session;
use Alert;
use DB;

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
        $new->no_regis_umum = $r->input('noregisumum'); //Cuma nomor
        $new->id_unit = $r->input('id_unit'); 
        $new->tgl_regis_umum = date($r->input('tglregisumum'));
        $new->no_ppbj = $r->input('noppbj'); //text, 20 nomor
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

     public function editPpbj($id) 
     {
      $data['ppbjedit'] = pbbj::find($id);
      // $data['editbarang'] = pbbj::with('Barang')->orderBy('id', 'desc')->find($id);
      $data['barang'] = barang::find($id);
      $data['unitkerja'] = unitkerja::get();
      $data['pengadaan'] = pengadaan::get();
      $data['jumlah'] = barang::where('id', '=', $id)->count();
      $data['barangnya'] = barang::where('id', '=', $id)->get();
      $data['id'] = $id;

        
      return view('ppbj.edit')->with($data);
    }

    public function updatePpbj(Request $r) {      
      $edit = pbbj::find($r->input('id'));
      $edit->kodePj = $r->input('kodePj');
      $edit->no_regis_umum = $r->input('noregisumum');
      $edit->id_unit = $r->input('id_unit');
      $edit->id_pengadaan = $r->input('jenispengadaan');  
      $edit->tgl_regis_umum = date($r->input('tglregisumum'));
      $edit->no_ppbj = $r->input('noppbj');
      $edit->tgl_permintaan_ppbj = date($r->input('tglpermintaanppbj'));
      $edit->tgl_dibutuhkan_ppbj = date($r->input('tgldibutuhkanppbj'));
      $edit->id_pengadaan = $r->input('jenispengadaan'); 

      $edit->save();

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
     Alert::success('Data Ppbj telah diEdit', 'Berhasil!')->autoclose('1300');
     return redirect()->route('allPpbj');
   }

   public function delete_ppbj($id)
   {
    pbbj::find($id)->delete();

    Alert::success('Data Ppbj telah dihapus', 'Berhasil!')->autoclose(1300);
    return redirect()->route('allPpbj');
  }
}
