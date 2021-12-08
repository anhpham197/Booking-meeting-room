<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Room;
use App\Models\User;

use Illuminate\Http\Request;

class ChartJsController extends Controller
{
    //
    public function userIndex()
    {
        // $months = User::select(
        //     \DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
        //     \DB::raw('max(created_at) as createdAt')
        // )
        // ->where("created_at", ">", \Carbon\Carbon::now()->subMonths(6))
        // ->orderBy('createdAt', 'desc')
        // ->groupBy('months')
        // ->get();
        $month = ['January','February','March','April','May', 'June', 'July', 'August', 'Septemper', 'October', 'November', 'December'];

        $user = [];
        foreach ($month as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%M')"),$value)->count();
        }

    	return view('admin.chartUser')->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }

    public function roomIndex()
    {
        $rooms = Room::all()->map->only('id');
        $roomName = Room::all()->pluck('name');

        //dd($roomName);
        $room = [];
        foreach ($rooms as $key => $value) {
            $room[] = Event::where('room_id', $value)->count();
        }

    	return view('admin.chartRoom')->with('roomName',json_encode($roomName,JSON_NUMERIC_CHECK))->with('room',json_encode($room,JSON_NUMERIC_CHECK));
        //dd($rooms);
    }
}
