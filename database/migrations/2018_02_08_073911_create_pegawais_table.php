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
                'id_jabatan' => '5',
                'notelp' => '089531292812',
            )
        );
        DB::table('pegawais')->insert(
            array(         
                'id' => 2,       
                'namapegawai' => 'Mba Widiya',
                'id_jabatan' => '5',
                'notelp' => '081291821191',
            )
        );
        DB::table('pegawais')->insert(
            array(     
                'id' => 3,           
                'namapegawai' => 'Pak Eko',
                'id_jabatan' => '5',
                'notelp' => '095761920115',
            )
        );
        DB::table('pegawais')->insert(
            array(    
                'id' => 4,            
                'namapegawai' => 'Mba Deva',
                'id_jabatan' => '5',
                'notelp' => '082201920831',
            )
        );
        DB::table('pegawais')->insert(
            array(    
                'id' => 5,            
                'namapegawai' => 'Pak Iwan',
                'id_jabatan' => '5',
                'notelp' => '0857102129',
            )
        );
        DB::table('pegawais')->insert(
            array(    
                'id' => 6,            
                'namapegawai' => 'Pak Makmun',
                'id_jabatan' => '5',
                'notelp' => '089538129121',
            )
        );
        DB::table('pegawais')->insert(
            array(    
                'id' => 7,            
                'namapegawai' => 'Bu Sri Adityawati',
                'id_jabatan' => '4',
                'notelp' => '089538129121',
            )
        );
        DB::table('pegawais')->insert(
            array(    
                'id' => 8,            
                'namapegawai' => 'Pak Sugiarjo',
                'id_jabatan' => '4',
                'notelp' => '089538129121',
            )
        );
        DB::table('pegawais')->insert(
            array(    
                'id' => 9,            
                'namapegawai' => 'Pak Yoni',
                'id_jabatan' => '3',
                'notelp' => '089538129121',
            )
        );
        DB::table('pegawais')->insert(
            array(    
                'id' => 10,            
                'namapegawai' => 'Pak Tomi',
                'id_jabatan' => '1',
                'notelp' => '089538129121',
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
