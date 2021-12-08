<?php


namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function show()
    {
        return view('booking.main');
    }

    public function getEventByDay(Request $request) {
        $events = Auth::user()->events;
        $res = array();
        foreach ($events as $event) {
            $starting_time = $event->starting_time;
            $date = (int) (date('d', strtotime($starting_time)));
            $month = (int) (date('m', strtotime($starting_time)));
            $year = (int) (date('Y', strtotime($starting_time)));
            if ($date == $request->date && $month == $request->month && $year == $request->year) {
                $room = $event->room;
                $responseData = [
                    'name' => $event->name,
                    'starting_time' => $event->starting_time,
                    'ending_time' => $event->ending_time,
                    'room' => $room->name
                ];
                array_push($res, $responseData);
            }   
        }
        return response()->json([
            'data' => $res,
            'status' => 200 
        ]);
    }
}
