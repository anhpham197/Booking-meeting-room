<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\User;
use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function users()
    {
        $users = User::paginate(10);

        return view('admin.layout', [
            'users' => $users
        ]);
    }

    public function userDetails($id)
    {
        //
        $user = User::query()->where('id', $id)->first();
        // dd($event);
        return view('admin.userDetails', [
            'user' => $user
        ]);
    }

    public function events()
    {
        $events = Event::all();
        //dd($events);
        return view('admin.allEvent', [
            'events' => $events
        ]);
    }

    public function eventDetails($id)
    {
        //
        // dd($id);
        $event = Event::query()->where('id', $id)->first();
        // dd($event);
        return view('admin.eventDetails', [
            'event' => $event
        ]);
    }

    public function deleteEvent($id)
    {
        //

        $event = event::find($id);
        $event->delete();
        return redirect()->back();
    }

    public function deleteUser($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function rooms()
    {
        $rooms = Room::paginate(10);
        //dd($rooms);
        return view('admin.allRooms', [
            'rooms' => $rooms
        ]);
    }

    public function roomDetails($id)
    {
        //
        // dd($id);
        $room = Room::query()->where('id', $id)->first();
        // dd($room);
        return view('admin.roomDetails', [
            'room' => $room
        ]);
    }

    public function deleteroom($id)
    {
        //
        $room = room::find($id);
        $room->delete();
        return redirect()->back();
    }
}
