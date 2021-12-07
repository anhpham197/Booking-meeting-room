<?php

namespace App\Exports;

use App\Models\Event;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;

class EventsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $events = Event::query()->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return collect($events);
    }
}
