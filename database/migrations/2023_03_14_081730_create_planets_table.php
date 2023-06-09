<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('diameter')->nullable();
            $table->string('rotation_period')->nullable();
            $table->string('orbital_period')->nullable();
            $table->string('gravity')->nullable();
            $table->string('population')->nullable();
            $table->string('climate')->nullable();
            $table->string('terrain')->nullable();
            $table->string('surface_water')->nullable();
            $table->string('url')->nullable();
            $table->string('created')->nullable();
            $table->string('edited')->nullable();
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
        Schema::dropIfExists('planets');
    }
}
