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
            $table->string('grado')->nullable();
            $table->date('fecha')->nullable();
            $table->string('telefono')->nullable();
            $table->string('plan')->nullable();
            $table->text('observaciones')->nullable();
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
