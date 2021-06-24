<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand')->nullable(false);
            $table->string('model')->nullable(false);
            $table->string('fuel_type')->nullable(false);
            $table->integer('fuel_tank_capacity')->nullable(false);
            $table->integer('max_speed')->nullable(false);
            $table->integer('price')->nullable(false);
            $table->string('color')->nullable(true);
            $table->string('description')->nullable(true);
            $table->integer('horsepower')->nullable(true);
            $table->string('transmission')->nullable(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
