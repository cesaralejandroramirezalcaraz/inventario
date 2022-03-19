<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AccesoController extends Controller
{
    public function index()
    {
         
      

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
