<?php

namespace App\Http\Controllers;

use App\Exports\FechaExport;
use Illuminate\Http\Request;
use App\Exports\RegistroExport;
use App\Exports\UserExport;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdministradorController extends Controller
{

    public function index()
    {
        return view('administrador_reportes');
    }

    public function masivo()
    {
        $sucursales = DB::table('sucursales')->get();
        //return Excel::download( $sucursales , 'users.xlsx');
        return (new RegistroExport)->download('users.csv');
    }
    public function fecha(Request $request)
    {

        return (new FechaExport($request))->download('users.csv');
    }
    public function adminbandeja()
    {
        $catalogo_productos = DB::table('catalogo_productos')->get();
        $sucursales = DB::table('sucursales')->get();
        $registro = DB::table('registro')->get();
        return view('administrador_bandeja', ['registro' => $registro, 'catalogo_productos' => $catalogo_productos, 'sucursales' => $sucursales]);
    }
    public function delete(Request $request)
    {
        $catalogo_productos = DB::table('catalogo_productos')->get();
        $sucursales = DB::table('sucursales')->get();
        DB::table('registro')->where('id', $request->input('id'))->delete();
        $registro = DB::table('registro')->get();
        return view('administrador_bandeja', ['registro' => $registro, 'catalogo_productos' => $catalogo_productos, 'sucursales' => $sucursales]);
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
        return view('administrador_bandeja', ['registro' => $registro, 'catalogo_productos' => $catalogo_productos, 'sucursales' => $sucursales]);
    }
    public function adminregistro(Request $request)
    {
        $catalogo_productos = DB::table('catalogo_productos')->get();
        $sucursales = DB::table('sucursales')->get();
        return view('administrador_registro', ['catalogo_productos' => $catalogo_productos, 'sucursales' => $sucursales]);
    }
    public function created(Request $request)
    {
        DB::table('registro')->insert(
            [
                'id' => null,
                'reg_nombre' => $request->input('nombre'),
                'reg_descripcion' => $request->input('des'),
                'reg_categoria' => $request->input('catalogo'),
                'reg_sucursal_id' => $request->input('sucursal'),
                'reg_precio' => $request->input('precio'),
                'reg_fecha_compra' => $request->input('fecha'),
                'reg_estado' => 'abierto',
                'reg_comentarios' => ''

            ]
        );

        $mensaje = 'Se registro el producto: ' . $request->input('nombre');
        $catalogo_productos = DB::table('catalogo_productos')->get();
        $sucursales = DB::table('sucursales')->get();
        return view('administrador_registro', ['catalogo_productos' => $catalogo_productos, 'sucursales' => $sucursales, 'mensaje' => $mensaje]);
    }
}
