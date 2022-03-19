<?php

namespace App\Exports;
use App\Registro;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Http\Request;

class FechaExport implements FromQuery
{

   private $fecha;
   public function __construct($fecha)
   {
       $this->fecha1=$fecha->input('fecha1');
       $this->fecha2=$fecha->input('fecha2');
      
   }
   use Exportable;
    public function query()
    { 
      
        return Registro::query()->whereBetween('reg_fecha_compra',[$this->fecha1,$this->fecha2]);
    }

}
