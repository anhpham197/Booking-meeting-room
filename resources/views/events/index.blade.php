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
                    <div class="relative flex w-full flex-wrap items-stretch"> 
                        <span
                          class="z-10 h-full leading-snug font-normal absolutetext-center text-gray-400 absolute bg-transparent rounded items-center justify-center pl-3 py-2">
                          <i class="fas fa-search"></i>
                        </span>
                        <input type="search" id="search" name="search" class="form-input placeholder-gray-400 w-72 pl-10" placeholder="Tìm kiếm..."
                                style="font-family: 'Font Awesome 5 Free', 'system-ui'; border: 1px solid #4f4f4f" >
                    </div>
                </div>
            </nav>

            <section class="row">
                <div class="col-12">
                    <form autocomplete="on" action="{{url('event/upload')}}" method="POST" enctype="multipart/form-data">
                        {{-- @method('PUT') --}}
                        @csrf

                        <div class="card">
                            <div class="card-header text-center">
                                <b>Đặt phòng họp</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="usernameBooking">Họ tên người đặt <span class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="usernameBooking" id="usernameBooking" aria-describedby="usernameBookingHid" required>
                                </div>

                                <div class="form-group">
                                    <label for="telephoneBooking">Số điện thoại</label>
                                    <input type="tel" class="form-control" name="telephoneBooking" id="telephoneBooking" aria-describedby="telephoneBookingHid" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="emailBooking">Email</label>
                                    <input type="email" class="form-control" name="emailBooking" id="emailBooking" aria-describedby="emailBookingHid" placeholder="">
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="booking_date_start">Ngày bắt đầu</label>
                                            <input type="date" class="form-control" name="booking_date_start" id="booking_date_start" >
                                        </div>
                                        <div class="col">
                                            <label for="time_start">Thời gian bắt đầu</label>
                                            <input type="time" class="form-control" name="time_start" id="time_start" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="booking_date_end">Ngày kết thúc</label>
                                            <input type="date" class="form-control" name="booking_date_end" id="booking_date_end" >
                                        </div>
                                        <div class="col">
                                            <label for="time_end">Thời gian kết thúc</label>
                                            <input type="time" class="form-control" name="time_end" id="time_end" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="roomId">Mã phòng</label>
                                    <select name="roomId" id="" class="form-control" id="roomId">
                                        <option value="405">405</option>
                                        <option value="406">406</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email người tham gia</label>
                                    <input type="email" class="form-control" id="emails" list="emails" multiple style="width: 100%;">
                                    <datalist id="emails">
                                        <option value="19021274@vnu.edu.vn">
                                        <option value="1234@vnu.edu.vn">
                                        <option value="23232@vnu.edu.vn">
                                        <option value="2342312@vnu.edu.vn">
                                    </datalist>
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
@endsection
