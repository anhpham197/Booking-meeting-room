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
                    <form autocomplete="on" action="{{ route('event.update', ['id' => $event->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="card">
                            <div class="card-header text-center uppercase text-xl font-semibold">
                                @if ($isOccured || $event->host->id != Auth::user()->id)
                                    {{ $event->name }}
                                @else
                                    EDIT YOUR MEETING
                                @endif
                            </div>
                            <div class="card-body">
                                @if (session()->has('successMessage'))
                                    <div class="flex justify-center items-center py-2 px-4 rounded-md text-green-700"
                                        id="msg" style="display: none">
                                        <div slot="avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-check-circle w-5 h-5 mx-2">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                        </div>
                                        <div class="font-semibold max-w-full">{{ session()->get('successMessage') }}</div>
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
                                        aria-describedby="telephoneBookingHid" required value="{{ Auth::user()->phone }}"
                                        @if ($isOccured || $event->host->id != Auth::user()->id)
                                    readonly
                                    @endif>
                                </div>

                                <div class="form-group">
                                    <label for="emailBooking" class="font-semibold">Email <span
                                            class="text-red-600">*</span></label>
                                    <input type="email" class="form-control" name="emailBooking" id="emailBooking"
                                        aria-describedby="emailBookingHid" value="{{ Auth::user()->email }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="font-semibold">Meeting name <span
                                            class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ $event->name }}" required @if ($isOccured || $event->host->id != Auth::user()->id) readonly @endif>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="booking_date_start" class="font-semibold">Starting time <span
                                                    class="text-red-600">*</span></label>
                                            <input type="datetime-local" min="{{ $minDate }}" class="form-control"
                                                name="starting_time" id="starting_time"
                                                value="{{ date('Y-m-d\TH:i', strtotime($event->starting_time)) }}"
                                                required @if ($isOccured || $event->host->id != Auth::user()->id)
                                            readonly
                                            @endif>
                                        </div>
                                        <div class="col">
                                            <label for="time_start" class="font-semibold">Ending time <span
                                                    class="text-red-600">*</span></label>
                                            <input type="datetime-local" min="{{ $minDate }}" class="form-control"
                                                name="ending_time" id="ending_time"
                                                value="{{ date('Y-m-d\TH:i', strtotime($event->ending_time)) }}" required
                                                @if ($isOccured || $event->host->id != Auth::user()->id)
                                            readonly
                                            @endif>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="roomId" class="font-semibold">Room name <span
                                            class="text-red-600">*</span></label>
                                    <select name="roomId" class="form-control" id="roomId" required @if ($isOccured || $event->host->id != Auth::user()->id)
                                        disabled
                                        @endif>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}" @if ($event->room_id == $room->id)
                                                selected
                                        @endif>{{ $room->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="font-semibold">Attendees' email <span
                                            class="text-red-600">*</span></label>
                                    <select class="form-control email" multiple="multiple" style="height: 40px"
                                        name="emails[]" required @if ($isOccured || $event->host->id != Auth::user()->id)
                                        disabled
                                        @endif>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @foreach ($event->users as $userJoin)
                                                @if ($userJoin->id == $user->id)
                                                    selected
                                                @endif
                                        @endforeach>{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @if (!$isOccured && Auth::user()->id == $event->host->id)
                                    <div class="form-group">
                                        <label for="file" class="font-semibold">Attached file</label>
                                        <input type="file" name="file">
                                    </div>
                                @endif


                                <div class="form-group">
                                    <label for="textarea" class="font-semibold">Note for us</label>
                                    <textarea id="textarea" name="note" class="form-control text-black" rows="5" @if ($isOccured || $event->host->id != Auth::user()->id) readonly @endif>@if (!empty($event->note)){{ $event->note }}@endif</textarea>
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: center;">
                                @if (!$isOccured)
                                    <button type="submit" class="btn btn-primary">UPDATE</button>
                                @endif
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
        $('#msg').fadeIn('fast', function() {
            $('#msg').delay(3000).fadeOut()
        })
    </script>
@endsection
