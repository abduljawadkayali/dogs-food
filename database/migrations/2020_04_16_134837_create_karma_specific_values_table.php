<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarmaSpecificValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karma_specific_values', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('karma_id')->unsigned()->index()->nullable();
            $table->foreign('karma_id')->references('id')->on('karmas');
            $table->bigInteger('Enerji');
            $table->bigInteger('Km');
            $table->bigInteger('Hp');
            $table->bigInteger('Lif');
            $table->bigInteger('Kul');
            $table->bigInteger('Karbonhidrat');
            $table->bigInteger('Kalsiyum');
            $table->bigInteger('Fosfor');
            $table->bigInteger('Ca_p');
            $table->bigInteger('Meganizyum');
            $table->bigInteger('Sodyum');
            $table->bigInteger('Taurin');
            $table->bigInteger('Yag');
            $table->bigInteger('LinoliekAsit');
            $table->bigInteger('Fiyat');
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
        Schema::dropIfExists('karma_specific_values');
    }
}
