<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionesHotel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones_hotel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id');
            $table->integer('tipo_habitacion_id');
            $table->integer('tipo_acomodacion_id');
            $table->integer('cantidad');
            $table->foreign('hotel_id')->references('id')->on('hoteles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tipo_habitacion_id')->references('id')->on('tipo_habitaciones')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tipo_acomodacion_id')->references('id')->on('tipo_acomodaciones')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('habitaciones_hotel');
    }
}
