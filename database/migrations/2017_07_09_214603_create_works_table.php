<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bnet_email');
            $table->string('bnet_password');
            $table->string('tag');
            $table->string('server');
            $table->integer('startRank');
            $table->integer('currentRank');
            $table->integer('newRank');
            $table->integer('price');
            $table->string('currency');
            $table->integer('user_id');
            $table->integer('receive_id')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('rating_works');//
    }
}
