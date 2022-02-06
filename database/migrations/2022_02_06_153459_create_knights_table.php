<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('picture');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('virtues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('knight_id')->constrained('knights');
            $table->string('name');
            $table->integer('value');
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
        Schema::dropIfExists('virtues');
        Schema::dropIfExists('knights');
    }
}
