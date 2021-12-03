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
        $rooms = Room::all();
        $users = User::query()->where('company_id', Auth::user()->company_id)->get();
        return view('events.create', [
            'users' => $users,
            'rooms' => $rooms
        ]);
    }

    /* Lưu thông tin đăng kí tạo cuộc họp */
    public function store(Request $request)
    {
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
        $data->start_day = $request->booking_date_start;
        $data->end_day = $request->booking_date_end;
        $data->start_time = $request->time_start;
        $data->end_time = $request->time_end;
        $data->room_id = $request->roomId;
        $data->description = $request->description;
        $data->note = $request->note;
        $data->save();

        $users = User::query()->whereIn('id', $request->emails)->get();
        foreach ($users as $user) {
            $user->events()->attach($data->id);
        }
        return redirect()->route('event.create', ['id' => Auth::user()->id]);
    }

    /* Hiển thị form chỉnh sửa cuộc họp */
    public function edit($id)
    {
        $user = User::query()->where('id', $id)->first();
        $rooms = Room::all();
        $users = User::query()->where('company_id', Auth::user()->company_id)->get();
        return view('events.create', [
            'user' => $user,
            'users' => $users,
            'rooms' => $rooms
        ]);
    }



    /* Cập nhật chỉnh sửa cuộc họp */
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
            'title' => $request->title,
            'name' => $request->usernameBooking,
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



    /* Xóa cuộc họp */
    public function destroy($id)
    {
        //
    }

    public function deleteEvent($id)
    {
        //
        $event = event::find($id);
        $event->delete();
        return redirect()->back();
    }


    /* Xem chi tiết cuộc họp */
    public function show($id)
    {
        //
        $event = Event::query()->where('id', $id)->first();
        //dd($event);
        return view('events.show', [
            'event' => $event
        ]);
    }

    /* Hiển thị form đánh giá cuộc họp */
    public function rate()
    {
        return view('events.rate');
    }

    public function showRooms()
    {
        $rooms = Room::all();
        return view('events.rooms', [
            'rooms' => $rooms
        ]);
    }
}
