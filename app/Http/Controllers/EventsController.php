<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        return view('events.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        /* $data = new event;
        $file = $request->fileupload;
        if ($file != '') {
            // echo "Yes";
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = base_path('files');
            $file->move($destinationPath, $fileName);
            $data->file = $fileName;
        } else {
            // dd('Request Has No File');
        }

        $data->address = $request->address;
        $data->full_name = $request->usernameBooking;
        $data->phone_number = $request->telephoneBooking;
        $data->email = $request->emailBooking;
        $data->start_day = $request->booking_date_start;
        $data->end_day = $request->booking_date_end;
        $data->start_time = $request->time_start;
        $data->end_time = $request->time_end;
        $data->partition_email = $request->emails;
        $data->description = $request->description;
        $data->note = $request->note;
        $data->save();
        return view('home'); */
        $users = User::all();
        return view('events.create', [
            'users' => $users
        ]);
    }
    
    
    public function store(Request $request)
    {
        $participants = $request->participants;
    }


    public function show($id)
    {
        //
    }


    public function rate() {
        return view('events.rate');
    }

    public function showRooms() {
        $rooms = Room::all();
        return view('events.rooms', [
            'rooms' => $rooms
        ]);
    }
}
