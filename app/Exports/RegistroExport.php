<?php

namespace App\Exports;
use App\Registro;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class RegistroExport implements FromQuery
{
    use Exportable;
    public function query()
    {
        return Registro::query();
    }
}
