<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fines', function (Blueprint $table) {
            $table->id('id_fine');
            $table->date('date');
            $table->time('time');
            $table->string('place');
            $table->integer('amount');
            $table->integer('id_officer')->unsigned();
            $table->foreign('id_oficer')->references('id')->on('officers');
            $table->integer('id_vehicle')->unsigned();
            $table->foreign('id_vehicle')->references('id')->on('vehicles');
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
        Schema::dropIfExists('fines');
    }
}
