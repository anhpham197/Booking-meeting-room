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
@endsection
</body>
</html>
