<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengadaans', function (Blueprint $table) {
            $table->increments('id_pengadaan');
            $table->text('namapengadaan');
            $table->timestamps();
        });

        DB::table('pengadaans')->insert(
            array(                
                'namapengadaan' => 'Pengadaan Pusat',
            )
        );
        DB::table('pengadaans')->insert(
            array(                
                'namapengadaan' => 'Pengadaan Cabang',
            )
        );
        DB::table('pengadaans')->insert(
            array(                
                'namapengadaan' => 'Pengadaan QA&QC',
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
        Schema::dropIfExists('pengadaans');
    }
}
