<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCambiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cambios', function (Blueprint $table) {
            $table->id(); 
            $table->string('referencia');
            $table->string('nombre1');
            $table->string('estado1');
            $table->integer('cantidad1');
            $table->string('nombre2');
            $table->string('estado2');
            $table->integer('cantidad2');
            $table->string('dependiente');
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
        Schema::dropIfExists('cambios');
    }
}
