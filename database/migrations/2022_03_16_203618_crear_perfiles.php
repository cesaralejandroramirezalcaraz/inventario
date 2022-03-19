<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CrearPerfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id('perfil_id');
            $table->string('perfil_nombre');
            
        });
        DB::table('perfiles')->insert(array(
            'perfil_id'=>null,
            'perfil_nombre' =>"capturista", 
        ));
        DB::table('perfiles')->insert(array(
            'perfil_id'=>null,
            'perfil_nombre' =>"gestor",  
        ));
        DB::table('perfiles')->insert(array(
            'perfil_id'=>null,
            'perfil_nombre' =>"administrador",  
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
