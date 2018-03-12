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
            $table->text('tgl_spph')->nullable(); //Tanggal Spph
            $table->text('no_spph')->nullable();
            $table->text('tgl_etp')->nullable();
            $table->text('tgl_pmn')->nullable(); //Tanggal Pengumuman
            $table->text('no_pmn')->nullable();
            $table->text('tgl_kon')->nullable(); //Tanggal Kontrak
            $table->text('no_kon')->nullable();
            $table->datetime('selesaispph')->nullable();
            $table->datetime('selesaietp')->nullable();
            $table->datetime('selesaipmn')->nullable();
            $table->datetime('selesaikon')->nullable();
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
