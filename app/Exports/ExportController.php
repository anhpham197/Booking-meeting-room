<?php

namespace App\Exports;

use App\Models\Room;
use App\Models\Event;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportController implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Starting Time',
            'Ending Time',
            'Note',
            'Room',
            'Description',
        ];
    }

    public function collection()
    {
        //
        $events = Event::all();
        $rooms = Room::all();
        foreach ($events as $row) {
            $event[] = array(
                '0' => $row->id,
                '1' => $row->name,
                '2' => $row->starting_time,
                '3' => $row->ending_time,
                '4' => $row->note,
                '5' => $rooms->find($row->room_id)->name,
                '6' => $row->description,
            );
        }

        return (collect($event));
    }


    public function export(){
        return Excel::download(new ExportController(), 'events.xlsx');
   }
}
