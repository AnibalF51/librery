<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');//VARCHAR 255
            $table->string('grado');
            $table->date('fecha');
            $table->string('telefono')->nullable();
            $table->string('plan')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('estado');
            $table->double('total')->nullable();
            $table->integer('usuario');
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
        Schema::dropIfExists('ventas');
    }
}
