<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('subtitle');
            $table->string('title');
            $table->dateTime('date');
            $table->text('text');
        });

        Schema::create('about_me', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('perex');
            $table->boolean('used');
            $table->text('text');
        });

        Schema::create('management', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('phone', 100);
            $table->boolean('used')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models');
    }
}
