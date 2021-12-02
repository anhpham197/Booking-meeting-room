<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
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
        $events = Event::query()->where('user_id', Auth::user()->id)->get();
        //dd($events);
        return view('events.index', [
            'events' => $events
        ]);
    }

    public function create()
    {
        //
        return view('events.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        //
        $data = new event;
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

        $data->full_name = $request->usernameBooking;
        $data->phone_number = $request->telephoneBooking;
        $data->email = $request->emailBooking;
        $data->start_day = $request->booking_date_start;
        $data->end_day = $request->booking_date_end;
        $data->start_time = $request->time_start;
        $data->end_time = $request->time_end;
        $data->room_id = $request->roomId;
        $data->partition_email = $request->emails;
        $data->description = $request->description;
        $data->note = $request->note;
        $data->save();
        return view('home');
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::query()->where('id', $id)->first();
        //dd($event);
        return view('events.edit', [
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'usernameBooking' => 'required',
            'telephoneBooking' => 'required|numeric',
            'emailBooking' => 'required|email',
        ]);

        $data = new event;
        $file = $request->fileupload;
        $fileName = time();
        if ($file != '') {
            // echo "Yes";
            $fileName = $fileName . '.' . $file->getClientOriginalExtension();
            $destinationPath = base_path('files');
            $file->move($destinationPath, $fileName);
            //$data->file = $fileName;
        }

        $event = Event::where('id', $id)->update([
            'full_name' => $request->usernameBooking,
            'phone_number' => $request->telephoneBooking,
            'email' => $request->emailBooking,
            'start_day' => $request->booking_date_start,
            'end_day' => $request->booking_date_end,
            'start_time' => $request->time_start,
            'end_time' => $request->time_end,
            'room_id' => $request->roomId,
            'partition_email' => $request->emails,
            'description' => $request->description,
            'note' => $request->note,
            'file' => $fileName
        ]);

        return redirect()->route('event.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function rate()
    {
        return view('events.rate');
    }

    public function showRooms() {
        $rooms = Room::all();
        return view('events.rooms', [
            'rooms' => $rooms
        ]);
    }
}
