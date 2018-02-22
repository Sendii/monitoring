<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('roleid')->default(4); //4 Is User People
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
            'name' => 'Kasubag',
                'email' => 'kasubag@kasubag.com',
                'password' => bcrypt('kasubag1'),    
                'roleid' => 1, 
            )
        );

        DB::table('users')->insert(
            array(                
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin1'),    
                'roleid' => 2,
            )
        );

        DB::table('users')->insert(
            array(                
                'name' => 'Kepala Divisi',
                'email' => 'kadiv@kadiv.com',
                'password' => bcrypt('kadiv1'),    
                'roleid' => 3,
            )
        );

        DB::table('users')->insert(
            array(                
                'name' => 'User People',
                'email' => 'user@user.com',
                'password' => bcrypt('useer1'),    
                'roleid' => 4,
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
        Schema::dropIfExists('users');
    }
}
