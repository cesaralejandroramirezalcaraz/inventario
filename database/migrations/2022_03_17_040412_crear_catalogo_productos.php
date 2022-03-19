<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CrearCatalogoProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_productos', function (Blueprint $table) {
            $table->id('catalogo_productos_id');
            $table->string('catalogo_productos_nombre');
        });
        DB::table('catalogo_productos')->insert(array(
            'catalogo_productos_id' => null,
            'catalogo_productos_nombre' => "Electrónica",

        ));
        DB::table('catalogo_productos')->insert(array(
            'catalogo_productos_id' => null,
            'catalogo_productos_nombre' => "Línea Blanca",

        ));
        DB::table('catalogo_productos')->insert(array(
            'catalogo_productos_id' => null,
            'catalogo_productos_nombre' => "Deportes",

        ));
        DB::table('catalogo_productos')->insert(array(
            'catalogo_productos_id' => null,
            'catalogo_productos_nombre' => "Alimentos",

        ));
        DB::table('catalogo_productos')->insert(array(
            'catalogo_productos_id' => null,
            'catalogo_productos_nombre' => "Jardín",

        ));
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
