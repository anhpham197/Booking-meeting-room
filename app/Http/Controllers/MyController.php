<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\EventsExport;
use App\Exports\FacilitiesExport;

use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExportView()
    {
        return view('import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportEvents()
    {
        return Excel::download(new EventsExport, 'events.xlsx');
    }

    public function exportRooms()
    {
        return Excel::download(new RoomsExport, 'rooms.xlsx');
    }

    public function exportFacilities()
    {
        return Excel::download(new FacilitiesExport, 'facilities.xlsx');
    }

    public function exportCompanies()
    {
        return Excel::download(new CompaniesExport, 'companies.xlsx');
    }
}
