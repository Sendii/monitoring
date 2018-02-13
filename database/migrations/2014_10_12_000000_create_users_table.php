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
            $table->integer('roleid')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

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
            'name' => 'Kasubag',
                'email' => 'kasubag@kasubag.com',
                'password' => bcrypt('kasubag1'),    
                'roleid' => 1, 
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
