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
        return view('admin.user', [
            'user' => $user
        ]);
    }

    public function deleteUser($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users');
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
        $event = Event::find($id);
        $users = $event->users;
        return view('admin.event', [
            'event' => $event,
            'users' => $users
        ]);
    }

    public function deleteEvent($id)
    {
        //

        $event = event::find($id);
        $event->delete();
        return redirect()->route('admin.events');
    }

    public function rooms()
    {
        $rooms = Room::all();
        return view('admin.rooms', [
            'rooms' => $rooms
        ]);
    }

    public function createRoom()
    {
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
        return redirect()->route('admin.rooms');
    }

    public function updateRoom(Request $request, $id) {
        $room = Room::find($id);
        $room->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'area' => $request->area,
            'status' => $request->status
        ]);
        $room->facilities()->sync($request->facilities);
        return redirect()->route('admin.rooms');
    }

    public function roomEdit($id)
    {
        $room = Room::query()->where('id', $id)->first();
        $facilities = Facility::all();
        return view('admin.room', [
            'room' => $room,
            'facilities' => $facilities
        ]);
    }

    public function deleteRoom($id)
    {
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('admin.rooms');
    }

    public function facilities()
    {
        $facilities = Facility::all();
        //dd($facilities);
        return view('admin.facilities', [
            'facilities' => $facilities
        ]);
    }

    public function createFacility()
    {
        return view('admin.facility');
    }

    public function storeFacility(Request $request)
    {
        foreach ($request->facilities as $facility) {
            Facility::firstOrCreate([
                'name' => $facility
            ]);
        }
        return redirect()->route('admin.facilities');
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
        $companies = Company::all();
        return view('admin.companies', [
            'companies' => $companies
        ]);
    }
}
