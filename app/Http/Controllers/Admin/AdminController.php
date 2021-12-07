<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Facility;
use App\Models\Test;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function users()
    {
        $users = User::where('isAdmin', 0)->get();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function userDetails($id)
    {
        //
        $user = User::query()->where('id', $id)->first();
        // dd($event);
        return view('admin.user', [
            'user' => $user
        ]);
    }

    public function deleteUser($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function userEdit($id)
    {
        $user = User::query()->where('id', $id)->first();
        // dd($user);
        return view('admin.user', [
            'user' => $user
        ]);
    }

    public function events()
    {
        $events = Event::all();
        $rooms = Room::all();
        //dd($events);
        return view('admin.events', [
            'events' => $events,
            'rooms' => $rooms
        ]);
    }

    public function eventDetails($id)
    {
        //
        $event = Event::find($id);
        $rooms = Room::all();
        $users = User::query()->where('company_id', Auth::user()->company_id)->get();
        $minDate = date("Y-m-d\TH:i");
        return view('admin.event', [
            'event' => $event,
            'rooms' => $rooms,
            'users' => $users,
            'minDate' => $minDate
        ]);
    }

    public function eventEdit($id)
    {
        $event = Event::find($id);
        $rooms = Room::all();
        $users = User::query()->where('company_id', Auth::user()->company_id)->get();
        $minDate = date("Y-m-d\TH:i");
        return view('admin.event', [
            'event' => $event,
            'rooms' => $rooms,
            'users' => $users,
            'minDate' => $minDate
        ]);
    }

    public function deleteEvent($id)
    {
        //

        $event = event::find($id);
        $event->delete();
        return redirect()->back();
    }

    public function rooms()
    {
        $rooms = Room::paginate(10);
        //dd($rooms);
        return view('admin.rooms', [
            'rooms' => $rooms
        ]);
    }

    public function createRoom()
    {
        //
        $room = Room::first();
        $facilities = Facility::all();
        // dd($facilities);
        return view('admin.room', [
            'room' => $room,
            'facilities' => $facilities
        ]);
    }

    public function storeRoom(Request $request)
    {
        $data = new Room();
        $data->name = $request->name;
        $data->capacity = $request->capacity;
        $data->area = $request->area;
        $data->status = $request->status;
        $data->save();
        $facilities = Facility::query()->whereIn('id', $request->facilities)->get();
        foreach ($facilities as $facilitiy) {
            $facilitiy->room()->attach($data->id);
        }
        return redirect()->back();
    }

    public function roomEdit($id)
    {
        //
        $room = Room::query()->where('id', $id)->first();
        // dd($room);
        $facilities = Facility::all();
        return view('admin.room', [
            'room' => $room,
            'facilities' => $facilities
        ]);
    }

    public function deleteRoom($id)
    {
        //
        $room = room::find($id);
        $room->delete();
        return redirect()->back();
    }

    public function facilities()
    {
        $facilities = Facility::paginate(10);
        //dd($facilities);
        return view('admin.facilities', [
            'facilities' => $facilities
        ]);
    }

    public function createFacility()
    {
        //
        $facility = Facility::first();
        // dd($facilities);
        return view('admin.facility', [
            'facility' => $facility,
        ]);
    }

    public function storeFacility(Request $request)
    {
        $data = new Facility();
        $data->name = $request->name;
        $data->save();

        return redirect()->back();
    }

    public function facilityEdit($id)
    {
        //
        $facility = Facility::query()->where('id', $id)->first();
        // dd($facility);
        return view('admin.facility', [
            'facility' => $facility,
        ]);
    }

    public function deleteFacility($id)
    {
        //
        $facility = Facility::find($id);
        $facility->delete();
        return redirect()->back();
    }

    public function companies()
    {
        $companies = Company::paginate(10);
        //dd($facilities);
        return view('admin.companies', [
            'companies' => $companies
        ]);
    }
}
