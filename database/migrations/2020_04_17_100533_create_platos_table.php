<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('idPlato');
            $table->string('nombrePlato');
            $table->string('ingredientes');
            $table->string('alergenos');
            $table->double('precioPlato');
            $table->unsignedBigInteger('idRestaurante');
            $table->foreign('idRestaurante')
                ->references('idRestaurante')->on('restaurantes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('platos');
    }
}
