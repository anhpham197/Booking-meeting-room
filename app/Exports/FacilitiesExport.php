<?php

namespace App\Exports;

use App\Models\Facility;
use Maatwebsite\Excel\Concerns\FromCollection;

class FacilitiesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Facility::all();
    }
}
