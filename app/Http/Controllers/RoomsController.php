<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
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
        return view('rooms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data = new room;
        $image = $request->image;
        if ($image != '') {
            // echo "Yes";
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = base_path('img');
            $image->move($destinationPath, $imageName);
            $data->image = $imageName;
        } else {
            // dd('Request Has No Image');
        }
        $data->name = $request->roomName;
        $data->capacity = $request->capacity;
        $data->description = $request->description;

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
        $room = Room::query()->where('id', $id)->first();
        //dd($room);
        return view('rooms.edit', [
            'room' => $room
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
            'capacity' => 'required',
            'id' => 'required|numeric',
        ]);

        $image = $request->image;
        $imageName = time();
        if ($image != '') {
            // echo "Yes";
            $imageName = $imageName . '.' . $image->getClientOriginalExtension();
            $destinationPath = base_path('img');
            $image->move($destinationPath, $imageName);
            //$data->image = $imageName;
        }

        $room = Room::where('id', $id)->update([
            'name' => $request->roomName,
            'capacity' => $request->capacity,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return redirect()->route('room.edit', $id);
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
}
