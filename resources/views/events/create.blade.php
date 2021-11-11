{{-- <!DOCTYPE html>
<html>
<head>
    <title>Booking Room</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>
        .form-group + .form-group{
            margin-top: 15px;
        }

        .card , .card-header{
            border-radius: 0px;
        }
    </style>
</head>
<body>
    <main class="container"> --}}
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
                    <form autocomplete="on" action="{{route('event.update')}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="card">
                            <div class="card-header text-center">
                                <b>Đặt phòng họp</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="usernameBooking">Họ tên người đặt</label>
                                    <input type="text" class="form-control" name="usernameBooking" id="usernameBooking" aria-describedby="usernameBookingHid" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" id="address" aria-describedby="addressHid" placeholder="">
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
                                    <select name="roomId" id="">
                                        <option value="405">405</option>
                                        <option value="406">406</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email người tham gia</label>
                                    <input type="email" list="emails" multiple style="width: 100%;">
                                    <datalist id="emails">
                                        <option value="19021274@vnu.edu.vn">
                                        <option value="1234@vnu.edu.vn">
                                        <option value="23232@vnu.edu.vn">
                                        <option value="2342312@vnu.edu.vn">
                                    </datalist>
                                </div>

                                <div class="form-group">
                                    <label for="textarea">Nội dung cuộc họp</label>
                                    <textarea id="textarea1" class="form-control" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="fileupload">Đính kèm tệp</label>
                                    <input type = "file" name = "fileupload" >
                                </div>

                                <div class="form-group">
                                    <label for="textarea">Ghi chú</label>
                                    <textarea id="textarea2" class="form-control" rows="5"></textarea>
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
