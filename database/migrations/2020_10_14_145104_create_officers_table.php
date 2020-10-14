<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officers', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->id('id_officer');
            $table->string('name');
            $table->string('last_name');
            $table->string('ci');
            $table->string('address');
            $table->string('phone');
            $table->integer('id_position')->unsigned();
            $table->foreign('id_position')->references('id')->on('position');
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
        Schema::dropIfExists('officers');
    }
}
