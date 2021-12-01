<!DOCTYPE html>
<html>

<head>
    <title>Booking</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style_for_article.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


</head>

<body>



    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Booking</h3>
            </div>
            <ul class="lisst-unstyled components">

                <li>
                    <i class="fas fa-home"></i>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Thông
                        tin cá nhân</a>

                    <ul class="collapse list-unstyled subnav" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <i class="fas fa-chevron-circle-down"></i>
                    <a href="#">About</a>
                </li>
                <li>
                    <i class="far fa-file-alt"></i>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled subnav" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <i class="fas fa-paint-brush"></i>
                    <a href="#">Policy</a>
                </li>
                <li>
                    <i class="fas fa-mail-bulk"></i>
                    <a href="#">Contact </a>
                </li>

            </ul>
        </nav>
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light " style="height: 81px;">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="footer-main-cl">
                        <i class="fas fa-bars"></i>

                    </button>
                </div>
            </nav>

            <div class="event-content">
                <button class="add-event-btn">Thêm sự kiện</button>
            </div>
            <div class="card">
                <div class="card-header" style="padding: 15px 0px;">
                    <p style="margin: 0px ;margin-left: 10px;">Danh sách sự kiện</p>
                </div>
                <div class="card-body" style="height: 500px; padding: 15px 0px;">
                    <div class="select-event">
                        <div class="left-content">
                            <label for="entities" style="margin-left: 10px;">Xem: </label>
                            <input type="number" name="" id="entities" min="0" max="100" placeholder="1" step="10">
                            <p style="background-color: #321fdb; color: white;" onclick="funct_all(1)">Chọn toàn bộ</p>
                            <p style="background-color: #321fdb; color: white; opacity: 0.65; " onclick="funct_all(0)">
                                Bỏ chọn</p>
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
                    <div class="scroller" style="height:300px">
                        <table class="table table-striped table-bordered " id="table_to_highlight">
                            <thead>
                                <tr style="background-color: #fff;">
                                    <th></th>
                                    <th id="im-tb-id">ID
                                        <i class="fas fa-sort"></i>
                                    </th>

                                    <th id="im-tb-name">Họ và tên
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th>Số điện thoại

                                    </th>
                                    <th id="im-tb-mail1">Email
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th id="im-tb-sdate">Ngày bắt đầu
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th id="im-tb-fdate">Ngày kết thúc
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th id="im-tb-mail2">Email
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th>Mô tả

                                    </th>
                                    <th>Lưu ý

                                    </th>
                                    <th>File

                                    </th>
                                </tr>
                            </thead>

                            {{-- <tbody>
                                <tr id="row1" class="tb-row">
                                    <td>
                                        <input type="checkbox" name="" id="box1" disabled>
                                    </td>
                                    <td>3</td>
                                    <td>Kieu van tuyen1</td>
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
                                    <td>2</td>
                                    <td>Kieu van tuyen2</td>
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
                                    <td>9</td>
                                    <td>Kieu van tuyen4</td>
                                    <td>113</td>
                                    <td>Kieuvantuyen@gmail.com</td>
                                    <td>12/08/2021</td>
                                    <td>12/08/2021</td>
                                    <td>1190123@vnu.edu.vn</td>
                                    <td>ddddddddd</td>
                                    <td>sssssssss</td>
                                    <td>aaaaaaaaaaa</td>
                                </tr>
                                <tr id="row4" class="tb-row">
                                    <td>
                                        <input type="checkbox" name="" id="box3" disabled>
                                    </td>
                                    <td>8</td>
                                    <td>Kieu van tuyen5</td>
                                    <td>113</td>
                                    <td>Kieuvantuyen@gmail.com</td>
                                    <td>12/08/2021</td>
                                    <td>12/08/2021</td>
                                    <td>1190123@vnu.edu.vn</td>
                                    <td>ddddddddd</td>
                                    <td>sssssssss</td>
                                    <td>aaaaaaaaaaa</td>
                                </tr>
                                <tr id="row5" class="tb-row">
                                    <td>
                                        <input type="checkbox" name="" id="box3" disabled>
                                    </td>
                                    <td>7</td>
                                    <td>Kieu van tuyen6</td>
                                    <td>113</td>
                                    <td>Kieuvantuyen@gmail.com</td>
                                    <td>12/08/2021</td>
                                    <td>12/08/2021</td>
                                    <td>1190123@vnu.edu.vn</td>
                                    <td>ddddddddd</td>
                                    <td>sssssssss</td>
                                    <td>aaaaaaaaaaa</td>
                                </tr>
                                <tr id="row6" class="tb-row">
                                    <td>
                                        <input type="checkbox" name="" id="box3" disabled>
                                    </td>
                                    <td>1</td>
                                    <td>Kieu van tuyen7</td>
                                    <td>113</td>
                                    <td>Kieuvantuyen@gmail.com</td>
                                    <td>12/08/2021</td>
                                    <td>12/08/2021</td>
                                    <td>1190123@vnu.edu.vn</td>
                                    <td>ddddddddd</td>
                                    <td>sssssssss</td>
                                    <td>aaaaaaaaaaa</td>
                                </tr>
                            </tbody> --}}
                            @foreach ($events as $event)
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="" id="box3" disabled>
                                    </td>
                                    {{-- <td>{{ $event->id }}</td> --}}
                                    <td>{{ $event->full_name }}</td>
                                    <td>{{ $event->email }}</td>
                                    <td>{{ $event->phone_number }}</td>
                                </tr>
                            </tbody>
                        @endforeach
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
                    <hr class="footer-main-cl mb-4 mt-0 d-inline-block max-auto"
                        style="width: 125px; height: 10px;border-radius: 10px;">
                    <p class="mt-2">
                        Sản phẩm giúp đặt phòng nhanh chóng, đảm bản uy tín chất lượng
                    </p>
                </div>
                <div class="col-md-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">ingredient</h6>
                    <hr class="footer-main-cl mb-4 mt-0 d-inline-block max-auto"
                        style="width: 125px; height: 10px;border-radius: 10px;">
                    <ul class="list-unstyled">
                        <li class="my-2"><a href="#">HTML 5</a></li>
                        <li class="my-2"><a href="#">CSS 3</a></li>
                        <li class="my-2"><a href="#">Bootstrap 4</a></li>
                        <li class="my-2"><a href="#">JavaScript</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">contact</h6>
                    <hr class="footer-main-cl mb-4 mt-0 d-inline-block max-auto"
                        style="width: 125px; height: 10px;border-radius: 10px;">
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
                        <a href="">Copyright 1999-2021</a> by Penzz DKhanh. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>



    </footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>

    <script type="text/javascript">
        // code này chạy để chọn thông tin trong table
        document.getElementById('table_to_highlight')
            .addEventListener('click', function (item) {

                var row = item.path[1];
                var box = row.cells[0];
                if (!box.firstElementChild.checked) {
                    box.firstElementChild.checked = true;
                    row.style.backgroundColor = "#1e90ff";
                } else {
                    box.firstElementChild.checked = false;
                    row.style.backgroundColor = null;
                }
            });
<<<<<<< HEAD

        document.getElementById("im-tb-id").addEventListener("click", function () {
            sort_name("1", "table_to_highlight");
        });
        document.getElementById("im-tb-name").addEventListener("click", function () {
            sort_name("2", "table_to_highlight");
        });
        document.getElementById("im-tb-mail1").addEventListener("click", function () {
            sort_name("4", "table_to_highlight");
        });
        document.getElementById("im-tb-sdate").addEventListener("click", function () {
            sort_name("5", "table_to_highlight");
        });
        document.getElementById("im-tb-fdate").addEventListener("click", function () {
            sort_name("6", "table_to_highlight");
        });
        document.getElementById("im-tb-mail2").addEventListener("click", function () {
            sort_name("7", "table_to_highlight");
        });

    </script>

</body>

</html>
=======
        })
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script> --}}
    <script>
        $('.email').select2();
    </script>
@endsection
>>>>>>> anhpham
