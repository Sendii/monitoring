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
            $table->text('id_pengadaan');
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
