<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTipoHabitacionTipoAcomodacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones_tipo_acomodaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_habitacion_id');
            $table->integer('tipo_acomodacion_id');
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
        Schema::dropIfExists('habitaciones_tipo_acomodaciones');
    }
}
