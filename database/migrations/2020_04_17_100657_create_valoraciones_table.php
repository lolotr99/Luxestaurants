<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValoracionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoraciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('idRestaurante');
            $table->unsignedBigInteger('idPlato');
            $table->dateTime('fechaValoracion');
            $table->string('comentario');
            $table->enum('valor', [1,2,3,4,5]);
            $table->foreign('idUsuario')
                ->references('idUsuario')->on('reservas')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('idRestaurante')
                ->references('idRestaurante')->on('reservas')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('idPlato')
                ->references('id')->on('platos')
                ->onDelete('restrict')
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
        Schema::dropIfExists('valoraciones');
    }
}
