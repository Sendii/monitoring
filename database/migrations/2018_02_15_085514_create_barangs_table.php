<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->integer('id')->nullable(); //id ppbj
            $table->integer('banyak_brg');
            $table->text('nama_barang');
            $table->integer('jumlah_brg');
            $table->integer('harga_brg');
            $table->integer('total_brg');
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
        Schema::dropIfExists('barangs');
    }
}
