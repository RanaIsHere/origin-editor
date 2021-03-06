<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('vehicle_id');
            $table->string('vehicle_code', 20)->unique();
            $table->string('vehicle_brand', 50);
            $table->enum('vehicle_type', ['SEDAN', 'CONVERTIBLE', 'COUPE', 'SPORTS', 'SUV', 'MINIVAN']);
            $table->string('vehicle_color', 50);
            $table->double('vehicle_price');
            $table->string('vehicle_image', 100);
            // possible status
            $table->boolean('available')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
