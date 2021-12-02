@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content" class="leading-snug">
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
                            <tbody>
                                @foreach ($events as $event)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="" id="box3" disabled>
                                    </td>
                                    <td>{{$event->id}}</td>
                                    <td>{{$event->full_name}}</td>
                                </tr>


                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection


