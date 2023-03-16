<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planet_species', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('planet_id');
            $table->foreign('planet_id')->references('id')->on('planets');
            $table->unsignedBigInteger('species_id');
            $table->foreign('species_id')->references('id')->on('species');

            $table->unsignedInteger('number_of_people')->default(0);
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
        Schema::dropIfExists('planet_species');
    }
}
