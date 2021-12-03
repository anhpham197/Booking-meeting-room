<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

    /* Hiển thị danh sách các cuộc họp của user */
    public function index()
    {
        $events = Event::query()->where('user_id', Auth::user()->id)->get();
        return view('events.index', [
            'events' => $events
        ]);
    }

    /* Hiển thị form tạo cuộc họp */
    public function create()
    {
        $minDate = date("Y-m-d\TH:i");
        $rooms = Room::all();
        $users = User::query()->where('company_id', Auth::user()->company_id)->get();
        return view('events.create', [
            'users' => $users,
            'rooms' => $rooms,
            'minDate' => $minDate
        ]);
    }

    /* Lưu thông tin đăng kí tạo cuộc họp */
    public function store(Request $request)
    {
        $events = Event::where('room_id', $request->roomId)->get();
        $isOverlap = false;
        $msg = '';
        foreach($events as $event) {
            if ($request->starting_time <= $event->ending_time && $request->ending_time >= $event->starting_time) {
                $isOverlap = true;
                break;
            } 
        }
        if ($isOverlap == false) {
            $data = new Event();
            $file = $request->fileupload;
            if ($file != '') {
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = base_path('files');
                $file->move($destinationPath, $fileName);
                $data->file = $fileName;
            } else {
                // dd('Request Has No File');
            }
            $data->name = $request->title;
            $data->starting_time = $request->starting_time;
            $data->ending_time = $request->ending_time;
            $data->room_id = $request->roomId;
            $data->description = $request->description;
            $data->note = $request->note;
            $data->save();
    
            $users = User::query()->whereIn('id', $request->emails)->get();
            foreach($users as $user) {
                $user->events()->attach($data->id);
            }
            $msg = "Created successfully";
        } else $msg = "There is another meeting booked. Please select time again";
        return back()->with('message', $msg);
    }

    /* Hiển thị form chỉnh sửa cuộc họp */
    public function edit($id)
    {
        $event = Event::query()->where('id', $id)->first();
        return view('events.edit', [
            'event' => $event
        ]);
    }



    /* Cập nhật chỉnh sửa cuộc họp */
    public function update(Request $request, $id)
    {
        //
    }



    /* Xóa cuộc họp */
    public function destroy($id)
    {
        //
    }



    /* Xem chi tiết cuộc họp */
    public function show($id)
    {
        //
    }


    /* Hiển thị form đánh giá cuộc họp */
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
