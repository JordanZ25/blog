<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Wish', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_students');
            $table->integer('id_town');
            $table->integer('profile_1');
            $table->integer('profile_2');
            $table->integer('profile_3');
            $table->integer('profile_4');
            $table->integer('profile_5');
            $table->integer('profile_6');
            $table->integer('profile_7');
            $table->integer('profile_8');
            $table->integer('profile_9');
            $table->integer('profile_10');
            $table->integer('profile_11');
            $table->integer('profile_12');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishes');
    }
}
