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
                    <form autocomplete="on" action="{{route('event.update', [$event->id])}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="card">
                            <div class="card-header text-center">
                                <b>Booking a meeting room</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="usernameBooking">Họ tên người đặt</label>
                                    <input type="text" class="form-control" name="usernameBooking" id="usernameBooking" aria-describedby="usernameBookingHid" required readonly value="{{ Auth::user()->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="telephoneBooking">Số điện thoại</label>
                                    <input type="tel" class="form-control" name="telephoneBooking" id="telephoneBooking" aria-describedby="telephoneBookingHid" required value="{{ Auth::user()->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="emailBooking">Email</label>
                                    <input type="email" class="form-control" name="emailBooking" id="emailBooking" aria-describedby="emailBookingHid" value="{{ Auth::user()->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="title">Tiêu đề Cuộc họp <span class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHid" value="{{ $event->title }}" required>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="booking_date_start">Ngày bắt đầu</label>
                                            <input type="date" class="form-control" name="booking_date_start" id="booking_date_start" value="{{ $event->start_day->format('Y-m-d') }}">
                                        </div>
                                        <div class="col">
                                            <label for="time_start">Thời gian bắt đầu</label>
                                            <input type="time" class="form-control" name="time_start" id="time_start" value="{{ $event->start_time }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="booking_date_end">Ngày kết thúc</label>
                                            <input type="date" class="form-control" name="booking_date_end" id="booking_date_end" value="{{$event->end_day->format('Y-m-d') }}">
                                        </div>
                                        <div class="col">
                                            <label for="time_end">Thời gian kết thúc</label>
                                            <input type="time" class="form-control" name="time_end" id="time_end" value="{{ $event->end_time }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="roomId">Tên phòng</label>
                                    <select name="roomId" id="" class="form-control" id="roomId" value="{{ $event->room_id }}">
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email người tham gia</label>
                                    <select class="form-control email" multiple="multiple" style="height: 40px" name="emails[]" value="{{ $event->user_id }}" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="textarea">Nội dung cuộc họp</label>
                                    <textarea id="textarea1" name="description" class="form-control" rows="5" value="{{ $event->description }}"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="fileupload">Tệp trước đó</label> <br>
                                    {{$event->file}}
                                </div>

                                <div class="form-group">
                                    <label for="fileupload">Đính kèm tệp</label>
                                    <input type = "file" name = "fileupload" value="{{ $event->file }}">
                                </div>

                                <div class="form-group">
                                    <label for="textarea">Ghi chú</label>
                                    <textarea id="textarea2" name="note" class="form-control" rows="5" value="{{ $event->note }}"></textarea>
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: center;">
                                <button type="submit" class="btn btn-success">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    {{-- </main> --}}


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}
    <script>
        jQuery(document).ready(function() {
            $('#company-select').select2({
                tags: true
            });
        });
    </script>
{{-- </body>
</html> --}}
@endsection
