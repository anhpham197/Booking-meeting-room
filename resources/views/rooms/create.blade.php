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
                    <form autocomplete="on" action="{{url('room/upload')}}" method="POST" enctype="multipart/form-data">
                        {{-- @method('PUT') --}}
                        @csrf

                        <div class="card">
                            <div class="card-header text-center">
                                <b>Đặt phòng họp</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="full_name">Họ tên người đặt</label>
                                    <input type="text" class="form-control" name="full_name" id="full_name" aria-describedby="full_nameHid" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" id="address" aria-describedby="addressHid" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">Số điện thoại</label>
                                    <input type="tel" class="form-control" name="phone_number" id="phone_number" aria-describedby="phone_numberHid" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHid" placeholder="">
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="start_day">Ngày bắt đầu</label>
                                            <input type="date" class="form-control" name="start_day" id="start_day" >
                                        </div>
                                        <div class="col">
                                            <label for="start_time">Thời gian bắt đầu</label>
                                            <input type="time" class="form-control" name="start_time" id="start_time" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="end_day">Ngày kết thúc</label>
                                            <input type="date" class="form-control" name="end_day" id="end_day" >
                                        </div>
                                        <div class="col">
                                            <label for="end_time">Thời gian kết thúc</label>
                                            <input type="time" class="form-control" name="end_time" id="end_time" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="room_id">Mã phòng</label>
                                    <select name="room_id" id="" class="form-control" id="room_id">
                                        <option value="405">405</option>
                                        <option value="406">406</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email người tham gia</label>
                                    <input type="email" class="form-control" id="partition_email" list="partition_email" multiple style="width: 100%;">
                                    <datalist id="partition_email">
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
                                    <input type = "file" name = "fileupload" >
                                </div>

                                <div class="form-group">
                                    <label for="textarea">Ghi chú</label>
                                    <textarea id="textarea2" name="note" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: center;">
                                <button type="submit" class="btn btn-success">Đặt phòng</button>
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
