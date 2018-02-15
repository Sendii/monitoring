<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePbbjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbbjs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pegawai')->nullable(); //Mengambil data dari tabel pegawai dengan id_pegawai
            $table->integer('id_unit'); //Mengambil data dari tabel unit dengan id_unit
            $table->integer('id_proses')->nullable(); //Mengambil data dari tabel prosespengadaan dengan id_proses
            $table->text('kodePj');
            $table->integer('no_regis_umum');
            $table->date('tgl_regis_umum')->nullable();
            $table->text('no_ppbj');
            $table->date('tgl_permintaan_ppbj')->nullable();
            $table->date('tgl_dibutuhkan_ppbj')->nullable();
            $table->text('jenis_pengadaan');
            $table->integer('banyak_brg');
            $table->text('nama_barang');
            $table->integer('harga_brg');
            $table->integer('jumlah_brg');
            $table->integer('hargatotal_brg')->nullable();
            $table->timestamps();
        });

        DB::table('pbbjs')->insert(
            array(                
                'id_pegawai' => '2',
                'id_unit' => '4',
                'id_proses' => '1',    
                'kodePj' => '1001',
                'no_regis_umum' => '2001', 
                'tgl_regis_umum' => '2014_10_12', 
                'no_ppbj' => '1901', 
                'tgl_permintaan_ppbj' => '2014_10_12' ,
                'tgl_dibutuhkan_ppbj' => '2014_10_12' ,
                'jenis_pengadaan' => '1' ,
                'banyak_brg' => '1' ,
                'nama_barang' => 'Laptop' ,
                'harga_brg' => '100000' ,
                'jumlah_brg' => '2' ,
                'hargatotal_brg' =>'200000' , 
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pbbjs');
    }
}
