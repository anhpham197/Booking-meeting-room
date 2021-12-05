@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 70px;" >
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="cursor-pointer rounded-md">
                        <i class="fas fa-angle-double-left text-2xl font-normal text-gray-400"></i>
                    </button>
                    {{-- <div class="justify-center">Trang chủ</div> --}}
                </div>
            </nav>               

            <section class="row">
                <div class="col-12">
                    <form autocomplete="on" action="{{route('event.store', ['id' => Auth::user()->id])}}"  method="POST" enctype="multipart/form-data">
                        {{-- @method('PUT') --}}
                        @csrf

                        <div class="card">
<<<<<<< HEAD
                            <div class="card-header text-center uppercase text-xl font-semibold">Booking a meeting room
=======
                            <div class="card-header text-center uppercase text-xl font-semibold">BOOKING FORM
>>>>>>> 54733b9f62c114bedd32444b7dbd6507e8348d3a
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
                                    <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHid" required>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="booking_date_start" class="font-semibold">Starting time <span class="text-red-600">*</span></label>
                                            <input type="datetime-local" min="{{ $minDate }}" class="form-control" name="starting_time" id="starting_time" required>
                                        </div>
                                        <div class="col">
                                            <label for="time_start" class="font-semibold">Ending time <span class="text-red-600">*</span></label>
                                            <input type="datetime-local" min="{{ $minDate }}" class="form-control" name="ending_time" id="ending_time" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="roomId" class="font-semibold">Room name <span class="text-red-600">*</span></label>
                                    <select name="roomId" class="form-control" id="roomId" required>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="font-semibold">Attendees' email <span class="text-red-600">*</span></label>
                                    <select class="form-control email" multiple="multiple" style="height: 40px" name="emails[]" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
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
