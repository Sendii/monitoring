<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProsespengadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prosespengadaans', function (Blueprint $table) {
            $table->increments('id_prosespengadaan');
            $table->integer('id_pegawai')->nullable();
            $table->text('id')->nullable(); //id ppbj
            $table->date('tgl_spph')->nullable(); //Tanggal Spph
            $table->text('no_spph')->nullable();
            $table->date('tgl_etp')->nullable();
            $table->date('tgl_pmn')->nullable(); //Tanggal Pengumuman
            $table->text('no_pmn')->nullable();
            $table->date('tgl_kon')->nullable(); //Tanggal Kontrak
            $table->text('no_kon')->nullable();
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
        Schema::dropIfExists('prosespengadaans');
    }
}
