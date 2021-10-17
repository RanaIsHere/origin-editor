<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Credits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            // $table->string('credit_code', 20);
            $table->id('credit_id');
            $table->text('credit_code');
            $table->string('client_id', 255);
            $table->string('package_code', 20);
            $table->string('vehicle_code', 20);
            $table->date('credit_date');
            $table->string('fotocopy_of_identity', 50);
            $table->string('fotocopy_of_family', 50);
            $table->string('fotocopy_of_salary', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
}
