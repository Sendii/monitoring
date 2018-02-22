<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatans', function (Blueprint $table) {
            $table->increments('id_jabatan');
            $table->text('jabatan');
            $table->timestamps();
        });

        DB::table('jabatans')->insert(
            array(                
                'jabatan' => 'Kepala Sub Bagian',
            )
        );
        DB::table('jabatans')->insert(
            array(                
                'jabatan' => 'Admin',
            )
        );
        DB::table('jabatans')->insert(
            array(                
                'jabatan' => 'Kepala Divisi',
            )
        );
        DB::table('jabatans')->insert(
            array(                
                'jabatan' => 'User',
            )
        );
        DB::table('jabatans')->insert(
            array(                
                'jabatan' => 'Kepala Divisi',
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
        Schema::dropIfExists('jabatans');
    }
}
