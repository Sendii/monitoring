<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idpengguna');
            $table->string('url');
            $table->text('user_agent');
            $table->string('ip');
            $table->string('ip_port');
            $table->string('http_host');
            $table->string('http_referer');
            $table->string('pathinfo');
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
        Schema::dropIfExists('logdatas');
    }
}
