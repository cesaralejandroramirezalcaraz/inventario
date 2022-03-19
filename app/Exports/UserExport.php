<?php

namespace App\Exports;

use App\User;
use App\Registro;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class UserExport implements FromQuery
{
    
    use Exportable;
    public function query()
    {
        return User::query();
    }
}
