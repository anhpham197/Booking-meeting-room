@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content">
            <nav class="navbar navbar-light bg-light flex justify-between" style="height: 70px;">
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="cursor-pointer rounded-md">
                        <i class="fas fa-angle-double-left text-2xl font-normal text-gray-400"></i>
                    </button>
                    {{-- <div class="justify-center">Trang chủ</div> --}}
                </div>
                <div class="text-black font-semibold flex gap-2 items-center py-2 px-3 rounded-md"
                    style="background: #D9CAB3">
                    <i class="far fa-clock text-lg"></i>
                    <span id="ct"></span>
                </div>
            </nav>

            <section class="row">
                <div class="col-12">
                    <form autocomplete="on" action="{{ route('event.store', ['id' => Auth::user()->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-header text-center uppercase text-xl font-semibold">BOOKING FORM</div>
                            <div class="card-body">
                                @if (session()->has('errorMessage'))
                                    <div class="flex justify-center items-center font-medium py-2 px-4 rounded-md text-red-700"
                                        style="display: none" id="msg">
                                        <div slot="avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-alert-octagon w-5 h-5 mx-2">
                                                <polygon
                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                </polygon>
                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                            </svg>
                                        </div>
                                        <div class="font-normal max-w-full flex-initial">
                                            {{ session()->get('errorMessage') }}</div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="usernameBooking" class="font-semibold">Full name <span
                                            class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="usernameBooking" id="usernameBooking"
                                        aria-describedby="usernameBookingHid" required readonly
                                        value="{{ Auth::user()->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="telephoneBooking" class="font-semibold">Phone <span
                                            class="text-red-600">*</span></label>
                                    <input type="tel" class="form-control" name="telephoneBooking" id="telephoneBooking"
                                        aria-describedby="telephoneBookingHid" required value="{{ Auth::user()->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="emailBooking" class="font-semibold">Email <span
                                            class="text-red-600">*</span></label>
                                    <input type="email" class="form-control" name="emailBooking" id="emailBooking"
                                        aria-describedby="emailBookingHid" value="{{ Auth::user()->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="font-semibold">Meeting name <span
                                            class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ old('title') }}" required>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="booking_date_start" class="font-semibold">Starting time <span
                                                    class="text-red-600">*</span></label>
                                            <input type="datetime-local" min="{{ $minDate }}" class="form-control"
                                                name="starting_time" value="{{ old('starting_time') }}" id="starting_time"
                                                required>
                                        </div>
                                        <div class="col">
                                            <label for="time_start" class="font-semibold">Ending time <span
                                                    class="text-red-600">*</span></label>
                                            <input type="datetime-local" min="{{ $minDate }}" class="form-control"
                                                name="ending_time" id="ending_time" value="{{ old('ending_time') }}"
                                                required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="roomId" class="font-semibold">Room name <span
                                            class="text-red-600">*</span></label>
                                    <select name="roomId" class="form-control" id="roomId" required>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}"
                                                {{ old('roomId') == $room->id ? 'selected' : '' }}>{{ $room->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="font-semibold">Attendees' email <span
                                            class="text-red-600">*</span></label>
                                    <select class="form-control email" multiple="multiple" style="height: 40px"
                                        name="emails[]" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ (is_array(old('emails')) and in_array($user->id, old('emails'))) ? ' selected' : '' }}>
                                                {{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="file" class="font-semibold">Attached file</label>
                                    <input type="file" name="file">
                                </div>

                                <div class="form-group">
                                    <label for="textarea" class="font-semibold">Note for us</label>
                                    <textarea id="textarea" name="note" class="form-control" rows="5"
                                        placeholder="Let us know if you need anything...">{{ old('note') }}</textarea>
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
        $('#msg').fadeIn('10', function() {
            $('#msg').delay(3000).fadeOut()
        })
    </script>
@endsection
