<?php

namespace App\Exports;

use App\Models\Rooms;
use Maatwebsite\Excel\Concerns\FromCollection;

class RoomsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rooms::all();
    }
}
