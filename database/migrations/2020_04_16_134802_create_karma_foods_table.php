<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarmaFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karma_foods', function (Blueprint $table) {
            $table->Increments('id');
            $table->bigInteger('food_amount');
            $table->integer('food_id')->unsigned()->index()->nullable();
            $table->foreign('food_id')->references('id')->on('foods');
            $table->integer('karma_id')->unsigned()->index()->nullable();
            $table->foreign('karma_id')->references('id')->on('karmas');

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
        Schema::dropIfExists('karma_foods');
    }
}
