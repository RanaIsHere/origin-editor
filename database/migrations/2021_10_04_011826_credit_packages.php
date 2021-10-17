<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreditPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_packages', function (Blueprint $table) {
            // $table->string('package_code', 20);
            $table->id('package_code');
            $table->double('package_price');
            $table->double('down_payment');
            $table->integer('package_instalment_quantity');
            $table->double('interest');
            $table->double('instalment_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_packages');
    }
}
