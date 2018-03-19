<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitkerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitkerjas', function (Blueprint $table) {
            $table->increments('id_unit');
            $table->text('aa');
            $table->enum('unit_kerja', ['Kantor Pusat', 'Kantor Cabang']);    
            $table->timestamps();
        });

        DB::table('unitkerjas')->insert(
            array(                
                'aa' => 'Cabang Balikpapan',
                'unit_kerja' => 'Kantor Cabang'
            )
        );
        DB::table('unitkerjas')->insert(
            array(                
                'aa' => 'Bandar Lampung',
                'unit_kerja' => 'Kantor Cabang'
            )
        );
        DB::table('unitkerjas')->insert(
            array(                
                'aa' => 'Cabang Bandung',
                'unit_kerja' => 'Kantor Cabang'
            )
        );
        DB::table('unitkerjas')->insert(
            array(                
                'aa' => 'Cabang Banjarmasin',
                'unit_kerja' => 'Kantor Cabang'
            )
        );
        DB::table('unitkerjas')->insert(
            array(                
                'aa' => 'Cabang Batam',
                'unit_kerja' => 'Kantor Cabang'
            )
        );
        DB::table('unitkerjas')->insert(
            array(                
                'aa' => 'Cabang Batulicin',
                'unit_kerja' => 'Kantor Cabang'
            )
        );
        DB::table('unitkerjas')->insert(
            array(                
                'aa' => 'Cabang Bekasi',
                'unit_kerja' => 'Kantor Cabang'
            )
        );
        DB::table('unitkerjas')->insert(
            array(                
                'aa' => 'Cabang Bengkulu',
                'unit_kerja' => 'Kantor Cabang'
            )
        );
        DB::table('unitkerjas')->insert(
            array(                
                'aa' => 'Cabang Bontang',
                'unit_kerja' => 'Kantor Cabang'
            )
        );
        DB::table('unitkerjas')->insert(
            array(                
                'aa' => 'Cabang Cilacap',
                'unit_kerja' => 'Kantor Cabang'
            )
        );
        DB::table('unitkerjas')->insert(
            array(                
                'aa' => 'Cabang Cilegon',
                'unit_kerja' => 'Kantor Cabang'
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
        Schema::dropIfExists('unitkerjas');
    }
}
