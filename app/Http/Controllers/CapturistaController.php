<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class CapturistaController extends Controller
{
    public function index()
    {
        $catalogo_productos = DB::table('catalogo_productos')->get();
        $sucursales = DB::table('sucursales')->get();
        return view('capturista_registro',['catalogo_productos'=>$catalogo_productos,'sucursales'=>$sucursales]);
    }
    
    public function created(Request $request)
    {
        DB::table('registro')->insert(
            [
            'id'=>null,
            'reg_nombre'=>$request->input('nombre'),
            'reg_descripcion'=>$request->input('des'),
            'reg_categoria'=>$request->input('catalogo'),
            'reg_sucursal_id'=>$request->input('sucursal'),
            'reg_precio'=>$request->input('precio'),
            'reg_fecha_compra'=>$request->input('fecha'),
            'reg_estado'=>'abierto',
            'reg_comentarios'=>''      
          
            ]
        );
       
        $mensaje='Se registro el producto: '.$request->input('nombre');
        $catalogo_productos = DB::table('catalogo_productos')->get();
        $sucursales = DB::table('sucursales')->get();
        return view('capturista_registro',['catalogo_productos'=>$catalogo_productos,'sucursales'=>$sucursales,'mensaje'=>$mensaje]);
    }
}
