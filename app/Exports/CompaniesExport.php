<?php

namespace App\Exports;

use App\Models\Companies;
use Maatwebsite\Excel\Concerns\FromCollection;

class CompaniesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Companies::all();
    }
}
