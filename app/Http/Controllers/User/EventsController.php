<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

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
        $currentTime = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh'));
        $now = $currentTime->format('Y-m-d\TH:i');
        $events = Event::query()->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        // $events = $this->paginate($data)->withPath('/event/view');
        return view('events.index', [
            'events' => $events,
            'now' => $now
        ]);
    }

    public function paginate($items, $perPage = 1, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function downloadFile(Request $request, $file)
    {
        return response()->download(public_path('files/' . $file));
    }

    /* Hiển thị form tạo cuộc họp */
    public function create()
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh'));
        $minDate = $now->format('Y-m-d\TH:i');
        $rooms = Room::query()->where('status', 'Active')->get();
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
        $isValid = true;
        if ($request->ending_time <= $request->starting_time) {
            return redirect()->route('event.create', ['id' => Auth::user()->id])->with('errorMessage', "Ending time is not valid. Please check again!")->withInput();
        }
        foreach ($events as $event) {
            if ($request->starting_time <= $event->ending_time && $request->ending_time >= $event->starting_time) {
                $isOverlap = true;
                break;
            }
        }

        if ($isOverlap == false) {
            $data = new Event();
            $file = $request->file;
            if ($file != '') {
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $request->file->move('files', $fileName);
                $data->file = $fileName;
            } else {
                //dd('Request Has No File');
            }
            $data->user_id = Auth::user()->id;
            $data->name = $request->title;
            $data->starting_time = $request->starting_time;
            $data->ending_time = $request->ending_time;
            $data->room_id = $request->roomId;
            $data->note = $request->note;
            $data->save();
            //dd($request->emails.push(Auth::id()));
            $users = User::query()->whereIn('id', collect($request->emails)->push(Auth::id()))->get();

            //dd($users);
            foreach ($users as $user) {
                $user->events()->attach($data->id);
            }
            $message = [
                'type' => Auth::user()->name.' has invited you participating in a new meeting',
                'title' => $data->name,
                'starting_time' => date('H:i d/m/Y', strtotime($data->starting_time)),
                'ending_time' => date('H:i d/m/Y', strtotime($data->ending_time)),
                'url' => 'http://127.0.0.1:8000/booking'
            ];
            SendEmail::dispatch($message, $data->users)->delay(now()->addMinute(1));
            return redirect()->route('event.edit', ['id' => $data->id])->with('successMessage', 'Created successfully');
        } else {
            return redirect()->route('event.create', ['id' => Auth::user()->id])->with('errorMessage', "There is another meeting booked. Please select time again")->withInput();
        }
    }


    /* Hiển thị form chỉnh sửa cuộc họp */
    public function edit($id)
    {
        $currentTime = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh'));
        $minDate = $currentTime->format('Y-m-d\TH:i');
        $event = Event::find($id);
        $isOccured = false;
        if (strtotime($event->starting_time) <= strtotime($minDate)) {
            $isOccured = true;
        }
        $rooms = Room::all();
        $users = User::query()->where('company_id', Auth::user()->company_id)->get();
        return view('events.edit', [
            'event' => $event,
            'rooms' => $rooms,
            'users' => $users,
            'minDate' => $minDate,
            'isOccured' => $isOccured
        ]);
    }



    /* Cập nhật chỉnh sửa cuộc họp */
    public function update(Request $request, $id)
    {
        //
        $file = $request->file;
        $fileName = '';
        if ($file != '') {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $request->file->move('files', $fileName);
        }
        $event = Event::find($id);
        $event->users()->detach();
        $event->update([
            'name' => $request->title,
            'starting_time' => $request->starting_time,
            'ending_time' => $request->ending_time,
            'room_id' => $request->roomId,
            'note' => $request->note,
            'file' => $fileName
        ]);
        $event->users()->sync($request->emails);
        // dd($request->file);
        return redirect()->route('event.edit', ['id' => $id])->with('successMessage', 'Updated succesfully!');
    }



    /* Xóa cuộc họp */
    public function deleteEvent($id)
    {
        //
        $event = Event::find($id);
        $event->delete();
        return response()->json([
            'message' => 'Cancel meeting successfully!'
        ]);
    }

    /* Hiển thị form đánh giá cuộc họp */
    public function rate()
    {
        $events = Auth::user()->events;
        return view('events.rate', [
            'events' => $events
        ]);
    }

    public function getEventData($id)
    {
        $event = Event::query()->where('id', $id)->get();
        $room = Room::query()->where('id', $event[0]->room_id)->get();
        return response()->json([
            'startingTime' => date('H:i d/m/Y', strtotime($event[0]->starting_time)),
            'endingTime' => date('H:i d/m/Y', strtotime($event[0]->ending_time)),
            'roomName' => $room[0]->name
        ], 200, ['Content-type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /* Lưu đánh giá */
    public function saveRate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        foreach ($user->rates as $rate) {
            if ($rate->pivot->event_id == $request->meetingId) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'You have rated this meeting!',
                    'titleMsg' => 'Save failed'
                ]);
            }
        }
        $user->rates()->attach($request->meetingId, [
            'comment' => $request->comment
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Thanks for your feedback!',
            'titleMsg' => 'Saved successfully'
        ]);
    }

    /* Hiển thị danh sách phòng họp */
    public function showRooms()
    {
        $rooms = Room::simplePaginate(10);
        return view('events.rooms', [
            'rooms' => $rooms
        ]);
    }
}
