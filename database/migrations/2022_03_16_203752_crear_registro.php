<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearRegistro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('registro', function (Blueprint $table) {
            $table->id('id');
            $table->string('reg_nombre');
            $table->string('reg_descripcion');
            $table->string('reg_categoria');
            $table->bigInteger('reg_sucursal_id')->unsigned();
            $table->foreign('reg_sucursal_id')->references('sucursal_id')->on('sucursales')->onDelete('cascade');
            $table->integer('reg_precio');
            $table->string('reg_fecha_compra');
            $table->string('reg_estado');
            $table->string('reg_comentarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
