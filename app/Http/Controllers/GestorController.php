<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GestorController extends Controller
{
    public function index()
    {
        $catalogo_productos = DB::table('catalogo_productos')->get();
        $sucursales = DB::table('sucursales')->get();
        $registro = DB::table('registro')->get();
        return view('gestor_bandeja', ['registro' => $registro, 'catalogo_productos' => $catalogo_productos, 'sucursales' => $sucursales]);
    }
    public function delete(Request $request)
    {
        $catalogo_productos = DB::table('catalogo_productos')->get();
        $sucursales = DB::table('sucursales')->get();
        DB::table('registro')->where('id', $request->input('id'))->delete();
        $registro = DB::table('registro')->get();
        return view('gestor_bandeja', ['registro' => $registro, 'catalogo_productos' => $catalogo_productos, 'sucursales' => $sucursales]);
    }

    public function update(Request $request)
    {

        DB::table('registro')
            ->where('id', $request->input('id'))
            ->update([
                'reg_estado' => $request->input('estado'),
                'reg_comentarios' => $request->input('comentar'),
            ]);
        $catalogo_productos = DB::table('catalogo_productos')->get();
        $sucursales = DB::table('sucursales')->get();
        $registro = DB::table('registro')->get();
        return view('gestor_bandeja', ['registro' => $registro, 'catalogo_productos' => $catalogo_productos, 'sucursales' => $sucursales]);
    }
}
