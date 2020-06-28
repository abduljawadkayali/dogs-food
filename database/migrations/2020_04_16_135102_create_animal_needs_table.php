<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalNeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_needs', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('animal_id')->unsigned()->index()->nullable();
            $table->foreign('animal_id')->references('id')->on('animals');
            $table->decimal('Enerji');
            $table->decimal('Hp');
            $table->decimal('Lif')->nullable();
            $table->decimal('Kul')->nullable();
            $table->decimal('Karbonhidrat')->nullable();
            $table->decimal('Kalsiyum');
            $table->decimal('Fosfor');
            $table->decimal('Ca_p');
            $table->decimal('Meganizyum');
            $table->decimal('Sodyum');
            $table->decimal('Taurin')->nullable();
            $table->decimal('Yag');
            $table->decimal('LinoliekAsit');
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
        Schema::dropIfExists('animal_needs');
    }
}
