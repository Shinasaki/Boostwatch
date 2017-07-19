<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RatingBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_user');
            $table->string('payment_id');
            $table->string('payment_cart');
            $table->string('payer_id');
            $table->string('payer_email');
            $table->string('payer_firstname');
            $table->string('payer_lastname');
            $table->string('payer_country');
            $table->integer('price');
            $table->string('currency');
            $table->string('description');
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
        Schema::dropIfExists('rating_bills');//
    }
}
