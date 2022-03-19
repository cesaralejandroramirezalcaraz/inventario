<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CrearSucursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id('sucursal_id');
            $table->string('sucursal_nombre');
                      
        }); 
        
        DB::table('sucursales')->insert(array(
            'sucursal_id'=>null,
            'sucursal_nombre' =>"Cuernavaca",
            
        ));
        DB::table('sucursales')->insert(array(
            'sucursal_id'=>null,
            'sucursal_nombre' =>"Yautepec",
            
        ));
        DB::table('sucursales')->insert(array(
            'sucursal_id'=>null,
            'sucursal_nombre' =>"Cuautla",
            
        ));
        DB::table('sucursales')->insert(array(
            'sucursal_id'=>null,
            'sucursal_nombre' =>"Acapulco",
            
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
