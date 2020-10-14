<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfringementDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infringement_details', function (Blueprint $table) {
            $table->id('id_name_infringement');
            $table->string('name_infringement');
            $table->integer('code');
            $table->integer('amount');
            $table->integer('id_fine')->unsigned();
            $table->foreign('id_fine')->references('id')->on('fines');
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
        Schema::dropIfExists('infringement_details');
    }
}
