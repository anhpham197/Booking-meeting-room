<!DOCTYPE html>
<html>
<head>
	<title>Booking</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/khanh/css/style_for_article.css">
</head>

<body>
@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 60px;" >
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
<<<<<<< HEAD
            <div class="event-content">
                <button class="add-event-btn">Thêm sự kiện</button>
                <p class="event-list-p">Danh sách sự kiện</p>
                <div class="event-main-section">
                    <div class="select-event">
                        <div class="left-content">
                            <label for="entities">Xem: </label>
                            <input type="number" name="" id="entities" min="0" max="100" placeholder="1" step="10">
                            <p style="background-color: #321fdb; color: white;" onclick="funct_all(1)">Chọn toàn bộ</p>
                            <p style="background-color: #321fdb; color: white; opacity: 0.65; " onclick="funct_all(0)">Bỏ chọn</p>
                            <p>Copy</p>
                            <p>CSV</p>
                            <p>Excel</p>
                            <p>PDF</p>
                            <p>In</p>
                            <p>Cột</p>
                            <p style="background-color: #e55353; color: white;">Xóa</p>
=======

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
>>>>>>> anhpham
                        </div>
                        <div class="right-content">
                            <label for="search">Tìm kiếm:</label>
                            <input type="text" id="search">
                        </div>
                    </div>

                    <div class="scroller">
                        <table class="content-table" id="table_to_highlight">
                            <tr style="background-color: #fff;">
                                <th></th>
                                <th>ID
                                    <i class="fas fa-sort"></i>
                                </th>

                                <th>Họ và tên
                                   <i class="fas fa-sort"></i>
                                </th>
                                <th>Số điện thoại

                                </th>
                                <th>Email
                                   <i class="fas fa-sort"></i>
                                </th>
                                <th>Ngày bắt đầu
                                   <i class="fas fa-sort"></i>
                                </th>
                                <th>Ngày kết thúc
                                   <i class="fas fa-sort"></i>
                                </th>
                                <th>Email
                                   <i class="fas fa-sort"></i>
                                </th>
                                <th>Mô tả

                                </th>
                                <th>Lưu ý

                                </th>
                                <th>File

                                </th>
                            </tr>
                            <tr id="row1" class="tb-row">
                                <td>
                                    <input type="checkbox" name="" id="box1" disabled>
                                </td>
                                <td>1</td>
                                <td>Kieu van tuyen</td>
                                <td>113</td>
                                <td>Kieuvantuyen@gmail.com</td>
                                <td>12/08/2021</td>
                                <td>12/08/2021</td>
                                <td>1190123@vnu.edu.vn</td>
                                <td>ddddddddd</td>
                                <td>sssssssss</td>
                                <td>aaaaaaaaaaa</td>
                            </tr>
                            <tr id="row2" class="tb-row">
                                <td>
                                    <input type="checkbox" name="" id="box2" disabled>
                                </td>
                                <td>1</td>
                                <td>Kieu van tuyen</td>
                                <td>113</td>
                                <td>Kieuvantuyen@gmail.com</td>
                                <td>12/08/2021</td>
                                <td>12/08/2021</td>
                                <td>1190123@vnu.edu.vn</td>
                                <td>ddddddddd</td>
                                <td>sssssssss</td>
                                <td>aaaaaaaaaaa</td>
                            </tr>
                            <tr id="row3" class="tb-row">
                                <td>
                                    <input type="checkbox" name="" id="box3" disabled>
                                </td>
                                <td>1</td>
                                <td>Kieu van tuyen</td>
                                <td>113</td>
                                <td>Kieuvantuyen@gmail.com</td>
                                <td>12/08/2021</td>
                                <td>12/08/2021</td>
                                <td>1190123@vnu.edu.vn</td>
                                <td>ddddddddd</td>
                                <td>sssssssss</td>
                                <td>aaaaaaaaaaa</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <footer class="page-footer bg-dark pt-3 pb-5">

        <div class="container text-center text-md-left mt-5">
            <div class="row">
                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold"> product</h6>
                    <hr class="footer-main-cl mb-4 mt-0 d-inline-block max-auto" style="width: 125px; height: 10px;border-radius: 10px;">
                    <p class="mt-2">
                        Sản phẩm giúp đặt phòng nhanh chóng, đảm bản uy tín chất lượng
                    </p>
                </div>
                <div class="col-md-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">ingredient</h6>
                    <hr class="footer-main-cl mb-4 mt-0 d-inline-block max-auto" style="width: 125px; height: 10px;border-radius: 10px;">
                    <ul class="list-unstyled">
                        <li class="my-2"><a href="#">HTML 5</a></li>
                        <li class="my-2"><a href="#">CSS 3</a></li>
                        <li class="my-2"><a href="#">Bootstrap 4</a></li>
                        <li class="my-2"><a href="#">JavaScript</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">contact</h6>
                    <hr class="footer-main-cl mb-4 mt-0 d-inline-block max-auto" style="width: 125px; height: 10px;border-radius: 10px;">
                    <ul class="list-unstyled">
                        <li class="my-2"><i class="fas fa-phone mr-2"></i> 113</li>
                        <li class="my-2"><i class="fab fa-github mr-2"></i>penzz</li>
                        <li class="my-2"><i class="fas fa-envelope-square mr-2"></i>gmail</li>
                        <li class="my-2"><i class="fas fa-home mr-2"></i>144 Xuan Thuy</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="">
            <div class="footer-main-cl ">

                <div class="footer-copyright text-center py-4">
                    <p>
                        <a href="">Copyright 1999-2021</a>  by Penzz DKhanh. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>



    </footer>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
<script type="text/javascript">
// code này chạy để chọn thông tin trong table
    document.getElementById('table_to_highlight')
        .addEventListener('click', function (item) {

            var row = item.path[1];

            var box = row.cells[0];
            if(!box.firstElementChild.checked) {
                box.firstElementChild.checked = true;
                row.style.backgroundColor = "#1e90ff";
            } else {
                box.firstElementChild.checked = false;
                row.style.backgroundColor = null;
            }
        });
</script>
{{-- </body>
</html> --}}
=======
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
>>>>>>> anhpham
@endsection
</body>
</html>
