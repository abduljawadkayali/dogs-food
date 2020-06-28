<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->integer('animal_id')->unsigned()->index()->nullable();
            $table->foreign('animal_id')->references('id')->on('animals');

            $table->integer('karma_id')->unsigned()->index()->nullable();
            $table->foreign('karma_id')->references('id')->on('karmas');


            $table->string('EnerjiSonuc')->nullable();
            $table->string('KmSonuc')->nullable();
            $table->string('HpSonuc')->nullable();
            $table->string('LifSonuc')->nullable();
            $table->string('KulSonuc')->nullable();
            $table->string('KarbonhidratSonuc')->nullable();
            $table->string('KalsiyumSonuc')->nullable();
            $table->string('FosforSonuc')->nullable();
            $table->string('Ca_pSonuc')->nullable();
            $table->string('MeganizyumSonuc')->nullable();
            $table->string('SodyumSonuc')->nullable();
            $table->string('TaurinSonuc')->nullable();
            $table->string('YagSonuc')->nullable();
            $table->string('LinoliekAsitSonuc')->nullable();

            $table->decimal('EnerjiPercent')->nullable();
            $table->decimal('KmPercent')->nullable();
            $table->decimal('HpPercent')->nullable();
            $table->decimal('LifPercent')->nullable();
            $table->decimal('KulPercent')->nullable();
            $table->decimal('KarbonhidratPercent')->nullable();
            $table->decimal('KalsiyumPercent')->nullable();
            $table->decimal('FosforPercent')->nullable();
            $table->decimal('Ca_pPercent')->nullable();
            $table->decimal('MeganizyumPercent')->nullable();
            $table->decimal('SodyumPercent')->nullable();
            $table->decimal('TaurinPercent')->nullable();
            $table->decimal('YagPercent')->nullable();
            $table->decimal('LinoliekAsitPercent')->nullable();

            $table->decimal('EnerjiKM')->nullable();
            $table->decimal('KmKM')->nullable();
            $table->decimal('HpKM')->nullable();
            $table->decimal('LifKM')->nullable();
            $table->decimal('KulKM')->nullable();
            $table->decimal('KarbonhidratKM')->nullable();
            $table->decimal('KalsiyumKM')->nullable();
            $table->decimal('FosforKM')->nullable();
            $table->decimal('Ca_pKM')->nullable();
            $table->decimal('MeganizyumKM')->nullable();
            $table->decimal('SodyumKM')->nullable();
            $table->decimal('TaurinKM')->nullable();
            $table->decimal('YagKM')->nullable();
            $table->decimal('LinoliekAsitKM')->nullable();
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
        Schema::dropIfExists('solutions');
    }
}
