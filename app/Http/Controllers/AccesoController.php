<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AccesoController extends Controller
{
    public function index()
    {
 
      if (Auth::user()->acceso==0) {
         Auth::logout();
       return view('welcome');
        
      }else{

         DB::table('bitacora')->insert(
            [
            'bit_id'=>null,
            'bit_usuario'=>Auth::user()->email,
            'bit_fecha'=>date('Y-m-d H:i:s'),
          
            ]
        );
   
            if(Auth::user()->perfil == "capturista"){
               return view('capturista_home'); 
            }else
           
            if(Auth::user()->perfil == "gestor"){
               return view('gestor_home'); 
            }else
            
            if(Auth::user()->perfil == "administrador"){
               return view('administrador_home'); 
            }

      }
         
      
      

        
       
       
    }
}
