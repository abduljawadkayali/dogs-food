<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->integer('age');
            $table->integer('wight');
            $table->integer('child_n')->nullable();
            $table->integer('child_m')->nullable();
            $table->integer('dogum')->nullable();
            $table->integer('gebelik')->nullable();

            $table->integer('animal_food_type_id')->unsigned()->index()->nullable();
            $table->foreign('animal_food_type_id')->references('id')->on('animal_food_types');

            $table->integer('animal_type_id')->unsigned()->index()->nullable();
            $table->foreign('animal_type_id')->references('id')->on('animal_types');

            $table->integer('animal_family_id')->unsigned()->index()->nullable();
            $table->foreign('animal_family_id')->references('id')->on('animal_families');

            $table->integer('animal_motion_id')->unsigned()->index()->nullable();
            $table->foreign('animal_motion_id')->references('id')->on('animal_motions');

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('animals');
    }
}
