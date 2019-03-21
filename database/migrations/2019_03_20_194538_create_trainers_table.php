<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //esta funcion ejecuta la migracion
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');            
            $table->timestamps();//este campo genera la fecha y hora en la q se crea el registro
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //esta funcion la elimina
    {
        Schema::dropIfExists('trainers');
    }
}
