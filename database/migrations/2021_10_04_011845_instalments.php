<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Instalments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalments', function (Blueprint $table) {
            // $table->string('instalment_code', 20);
            // $table->string('credit_code', 20);
            $table->id('instalment_code');
            $table->integer('credit_code');
            $table->date('instalment_date');
            $table->double('instalment_quantity');
            $table->integer('instalment_of');
            $table->double('instalment_remaining');
            $table->double('instalment_remaining_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instalments');
    }
}
