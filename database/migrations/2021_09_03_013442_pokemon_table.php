<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PokemonTable', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('HP');
            $table->integer('Attack');
            $table->integer('Defence');
            $table->integer('SpAtk');
            $table->integer('SpDef');
            $table->string('move1');
            $table->string('move2');
            $table->string('move3');
            $table->string('move4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('flights');
    }
}
