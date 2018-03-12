<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->increments('id_pegawai');
            $table->integer('id')->nullable(); //Untuk memancing data saja
            $table->text('namapegawai');
            $table->integer('id_jabatan');
            $table->text('notelp');
            $table->timestamps();
        });

        DB::table('pegawais')->insert(
            array(
                'id' => 1,
                'namapegawai' => 'Pak Taufiq',
                'id_jabatan' => '4',
                'notelp' => '089531292812',
            )
        );
        DB::table('pegawais')->insert(
            array(         
                'id' => 2,       
                'namapegawai' => 'Bu Wati',
                'id_jabatan' => '3',
                'notelp' => '081291821191',
            )
        );
        DB::table('pegawais')->insert(
            array(     
                'id' => 3,           
                'namapegawai' => 'Pak Sugiargo',
                'id_jabatan' => '3',
                'notelp' => '095761920115',
            )
        );
        DB::table('pegawais')->insert(
            array(    
                'id' => 4,            
                'namapegawai' => 'Mba Deva',
                'id_jabatan' => '4',
                'notelp' => '082201920831',
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
        Schema::dropIfExists('pegawais');
    }
}
