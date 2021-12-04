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
                            <div class="card-header text-center uppercase text-xl font-semibold">Đặt phòng họp
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="usernameBooking">Họ và tên <span class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="usernameBooking" id="usernameBooking" aria-describedby="usernameBookingHid" required readonly value="{{ Auth::user()->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="telephoneBooking">Số điện thoại <span class="text-red-600">*</span></label>
                                    <input type="tel" class="form-control" name="telephoneBooking" id="telephoneBooking" aria-describedby="telephoneBookingHid" required value="{{ Auth::user()->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="emailBooking">Email <span class="text-red-600">*</span></label>
                                    <input type="email" class="form-control" name="emailBooking" id="emailBooking" aria-describedby="emailBookingHid" value="{{ Auth::user()->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="title">Tiêu đề Cuộc họp <span class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHid" required>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="booking_date_start">Starting time <span class="text-red-600">*</span></label>
                                            <input type="datetime-local" min="{{ $minDate }}" class="form-control" name="starting_time" id="starting_time" required>
                                        </div>
                                        <div class="col">
                                            <label for="time_start">Ending time <span class="text-red-600">*</span></label>
                                            <input type="datetime-local" min="{{ $minDate }}" class="form-control" name="ending_time" id="ending_time" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="roomId">Tên phòng <span class="text-red-600">*</span></label>
                                    <select name="roomId" class="form-control" id="roomId" required>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                                        @endforeach
                                    </select>
                                </div>   

                                <div class="form-group">
                                    <label for="email">Email người tham gia <span class="text-red-600">*</span></label>
                                    <select class="form-control email" multiple="multiple" style="height: 40px" name="emails[]" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="textarea">Nội dung cuộc họp</label>
                                    <textarea id="textarea1" name="description" class="form-control" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="fileupload">Đính kèm tệp</label>
                                    <input type="file" name="fileupload" >
                                </div>

                                <div class="form-group">
                                    <label for="textarea">Ghi chú</label>
                                    <textarea id="textarea2" name="note" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: center;">
                                <button type="submit" class="btn btn-primary">Đặt phòng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    {{-- <script type="text/javascript">
        $('#search').on('keyup',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: {
                    'search': $value
                },
                success:function(data){
                    $('#data').html(data);
                }
            });
        })
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script> --}}
    <script>
        $('.email').select2({
            placeholder: "  Nhập email người tham gia",
            allowClear: true,
        });
    </script>
@endsection