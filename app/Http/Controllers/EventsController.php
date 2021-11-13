<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $data->address = $request->address;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        // dd($event);
        return view('events.edit', [
            'event' => $event
            // 'company' => $event->company->name
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
            'address' => $request->address,
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


    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required'
        ]);
        Event::where('id', $id)->update([
            'password' => Hash::make($request->password)
        ]);
    }
}
