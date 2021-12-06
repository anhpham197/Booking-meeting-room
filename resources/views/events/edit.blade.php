@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 80px;" >
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="footer-main-cl rounded-md">
                        <i class="fas fa-bars p-3"></i>
                    </button>
                    <form action="" method="post" class="flex" class="border border-gray-100">
                        <input type="search" id="search" name="search" class="pl-2 border border-gray-100 rounded-l" onchange="hideIcon(this);" placeholder=" Tìm kiếm"/>
                        <button type="submit" class="bg-blue-400 hover:bg-blue-500 p-3 w-1/5 rounded-r"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </nav>

            <section class="row">
                <div class="col-12">
                    <form autocomplete="on" action="{{route('event.store', ['id' => Auth::user()->id])}}"  method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="card">
                            <div class="card-header text-center uppercase text-xl font-semibold">BOOKING FORM
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="usernameBooking" class="font-semibold">Full name <span class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="usernameBooking" id="usernameBooking" aria-describedby="usernameBookingHid" required readonly value="{{ Auth::user()->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="telephoneBooking" class="font-semibold">Phone <span class="text-red-600">*</span></label>
                                    <input type="tel" class="form-control" name="telephoneBooking" id="telephoneBooking" aria-describedby="telephoneBookingHid" required value="{{ Auth::user()->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="emailBooking" class="font-semibold">Email <span class="text-red-600">*</span></label>
                                    <input type="email" class="form-control" name="emailBooking" id="emailBooking" aria-describedby="emailBookingHid" value="{{ Auth::user()->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="font-semibold">Meeting name <span class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $event->name }}" required>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="booking_date_start" class="font-semibold">Starting time <span class="text-red-600">*</span></label>
                                            <input type="datetime-local" min="{{ $minDate }}" class="form-control" name="starting_time" id="starting_time" value="{{ date('Y-m-d\TH:i', strtotime($event->starting_time)) }}" required>
                                        </div>
                                        <div class="col">
                                            <label for="time_start" class="font-semibold">Ending time <span class="text-red-600">*</span></label>
                                            <input type="datetime-local" min="{{ $minDate }}" class="form-control" name="ending_time" id="ending_time" value="{{ date('Y-m-d\TH:i', strtotime($event->ending_time)) }}" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="roomId" class="font-semibold">Room name <span class="text-red-600">*</span></label>
                                    <select name="roomId" class="form-control" id="roomId" required>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}" @if ($event->room_id == $room->id)
                                                selected
                                            @endif>{{ $room->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="font-semibold">Attendees' email <span class="text-red-600">*</span></label>
                                    <select class="form-control email" multiple="multiple" style="height: 40px" name="emails[]" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @foreach ($event->users as $userJoin)
                                                @if ($userJoin->id == $user->id)
                                                    selected
                                                @endif
                                            @endforeach>{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="textarea" class="font-semibold">Meeting agenda</label>
                                    <textarea id="textarea1" name="description" class="form-control" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="fileupload" class="font-semibold">Attached file</label>
                                    <input type="file" name="fileupload" >
                                </div>

                                <div class="form-group">
                                    <label for="textarea" class="font-semibold">Note for us</label>
                                    <textarea id="textarea2" name="note" class="form-control" rows="5" placeholder="Let us know if you need anything..."></textarea>
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: center;">
                                <button type="submit" class="btn btn-primary">BOOKING</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <script>
        $('.email').select2({
            placeholder: "  Please enter attendees' email",
            allowClear: true,
        });
    </script>
@endsection
