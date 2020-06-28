<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_relations', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('food_id')->unsigned()->index()->nullable();
            $table->foreign('food_id')->references('id')->on('foods');

            $table->bigInteger('specific_value');

            $table->integer('food_specific_id')->unsigned()->index()->nullable();
            $table->foreign('food_specific_id')->references('id')->on('food_specifics');

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
        Schema::dropIfExists('food_relations');
    }
}
