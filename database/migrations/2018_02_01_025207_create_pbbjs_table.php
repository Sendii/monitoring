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
            
            $table->integer('id_pegawai')->nullable();
            $table->integer('id_proses');
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
