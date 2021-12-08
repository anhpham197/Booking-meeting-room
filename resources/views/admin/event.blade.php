@extends('admin.layout')
@section('data-table')
    <div class="my-3"><a class="py-2 px-3 bg-blue-500 rounded-md text-white uppercase" href="{{ route('admin.events') }}">Back</a></div>
    <form autocomplete="on" action="" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-header text-center uppercase text-xl font-semibold">EVENT INFORMATION
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="usernameBooking" class="font-semibold">Full name</label>
                    <input type="text" class="form-control" name="usernameBooking" id="usernameBooking" aria-describedby="usernameBookingHid" readonly value="{{ $event->host->name }}">
                </div>

                <div class="form-group">
                    <label for="telephoneBooking" class="font-semibold">Phone</label>
                    <input type="tel" class="form-control" name="telephoneBooking" id="telephoneBooking" aria-describedby="telephoneBookingHid" readonly value="{{ $event->host->phone }}">
                </div>

                <div class="form-group">
                    <label for="emailBooking" class="font-semibold">Email</label>
                    <input type="email" class="form-control" name="emailBooking" id="emailBooking" aria-describedby="emailBookingHid" value="{{ $event->host->email }}" readonly>
                </div>

                <div class="form-group">
                    <label for="title" class="font-semibold">Meeting name</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $event->name }}" readonly>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="booking_date_start" class="font-semibold">Starting time</label>
                            <input type="datetime-local" class="form-control" name="starting_time" id="starting_time" value="{{ date('Y-m-d\TH:i', strtotime($event->starting_time)) }}" readonly>
                        </div>
                        <div class="col">
                            <label for="time_start" class="font-semibold">Ending time</label>
                            <input type="datetime-local" class="form-control" name="ending_time" id="ending_time" value="{{ date('Y-m-d\TH:i', strtotime($event->ending_time)) }}" readonly>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="roomId" class="font-semibold">Room name</label>
                    <input type="text" class="form-control" name="" id="" value="{{ $event->room->name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="email" class="font-semibold">Attendees' email</label>
                    <select class="form-control email" multiple="multiple" style="height: 40px" name="emails[]" disabled>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" selected>{{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="textarea" class="font-semibold">Note for us</label>
                    <textarea id="textarea2" name="note" class="form-control" rows="5" readonly>{{ $event->note }}</textarea>
                </div>
            </div>
        </div>
    </form>
    <script>
        $('.email').select2({
            placeholder: "  Please enter attendees' email",
            allowClear: true,
        });
    </script>
@endsection
    


