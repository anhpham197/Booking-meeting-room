@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content" class="leading-snug">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 70px;">
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="cursor-pointer rounded-md">
                        <i class="fas fa-angle-double-left text-2xl font-normal text-gray-400"></i>
                    </button>
                    <div class="relative flex w-full flex-wrap items-stretch">
                        <span
                            class="z-10 h-full leading-snug font-normal absolutetext-center text-gray-400 absolute bg-transparent rounded items-center justify-center pl-3 py-2">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="search" id="search" name="search" class="form-input placeholder-gray-400 w-72 pl-10"
                            placeholder="Tìm kiếm..."
                            style="font-family: 'Font Awesome 5 Free', 'system-ui'; border: 1px solid #4f4f4f">
                    </div>
                </div>
            </nav>

            <div class="text-center py-3 font-semibold text-xl uppercase">{{ Auth::user()->company->name }}</div>

            <div class="">
                <div class="scroller" style="height: 500px;">
                    <table id="dtOrderExample" class="table table-bordered table-sm" cellspacing="0" width="100%"
                        style="text-align: center">
                        <thead class="table-idea">
                            <tr>
                                <th id="th-id" rowspan="2" style="line-height: 58px;" class="lg:w-16">
                                    ID
                                    <i class="fas fa-sort"></i>
                                </th>
                                <th id="th-name" rowspan="2" style="line-height: 58px;" class="lg:w-48">
                                    HỌ VÀ TÊN
                                    <i class="fas fa-sort"></i>
                                </th>
                                <th id="th-mail" rowspan="2" style="line-height: 58px;" class="lg:w-52">
                                    MAIL
                                <th rowspan="2" style="line-height: 58px;" class="lg:w-32">
                                    SỐ ĐIỆN THOẠI
                                </th>
                                <th colspan="3">
                                    LỊCH HỌP
                                </th>
                            </tr>
                            <tr>
                                <th id="th-date" style="width: 75px">Ngày</th>
                                <th id="th-hour" style="width: 50px;">Giờ</th>
                                <th id="th-meeting">Cuộc họp</th>
                            </tr>
                        </thead>
{{--                         <tbody>
                            <tr>
                                <td>1</td>
                                <td>Pham Ngoc Anh</td>
                                <td>NgocAnhNgu@gmail.com</td>
                                <td>103456789</td>
                                <td>29/11/2021</td>
                                <td>09:11</td>
                                <td>đây là cuộc họp chứ không phải cuộc chơi đùa cái lồn j dcm cả lũ nhân viên ngu này:)
                                </td>
                            </tr>

                        </tbody>
                        <tbody>
                            <tr>
                                <td rowspan="2">2</td>
                                <td rowspan="2">2Garrett Winters</td>
                                <td rowspan="2">20Garrett Winters@</td>
                                <td rowspan="2">123456789</td>
                                <td>2/3</td>
                                <td>8h</td>
                                <td>dau nam</td>
                            </tr>
                            <tr>
                                <td>11/11</td>
                                <td>8h</td>
                                <td>cuoi nam</td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td rowspan="3">3</td>
                                <td rowspan="3">3Garrett Winters</td>
                                <td rowspan="3">1Garrett Winters@</td>
                                <td rowspan="3">113456789</td>
                                <td>3/3</td>
                                <td>8h</td>
                                <td>dau nam</td>
                            </tr>
                            <tr>
                                <td>13/6</td>
                                <td>8h</td>
                                <td>giua nam</td>
                            </tr>
                            <tr>
                                <td>12/11</td>
                                <td>8h</td>
                                <td>cuoi nam</td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td rowspan="4">4</td>
                                <td rowspan="4">4Garrett Winters</td>
                                <td rowspan="4">9Garrett Winters@</td>
                                <td rowspan="4">113456789</td>
                                <td>3/3</td>
                                <td>8h</td>
                                <td>dau nam</td>
                            </tr>
                            <tr>
                                <td>13/6</td>
                                <td>8h</td>
                                <td>giua nam</td>
                            </tr>
                            <tr>
                                <td>12/11</td>
                                <td>8h</td>
                                <td>cuoi nam</td>
                            </tr>
                            <tr>
                                <td>24/12</td>
                                <td>8h</td>
                                <td>cuoi nam</td>
                            </tr>
                        </tbody> --}}

                        @foreach ($users as $user)
                            <tbody class="table-hover">
                                <tr>
                                    <td rowspan="2">{{ $user->id }}</td>
                                    <td rowspan="2">{{ $user->name }}</td>
                                    <td rowspan="2">{{ $user->email }}</td>
                                    <td rowspan="2">{{ $user->phone }}</td>
                                    <td>29/11/2021</td>
                                    <td>08:00</td>
                                    <td>Họp tổng kết cuối năm</td>
                                </tr>
                                <tr>
                                    <td>29/12/2021</td>
                                    <td>13:00</td>
                                    <td>Bàn giao sản phẩm</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        var num = 1;
        function sort_name(col, table_name) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById(table_name);
            switching = true;
            num *= -1;
            while (switching) {

                switching = false;
                rows = table.rows;

                for (i = 2; i < (rows.length - 1); i++) {

                    shouldSwitch = false;

                    x = rows[i].getElementsByTagName("TD")[col];
                    y = rows[i + 1].getElementsByTagName("TD")[col];

                    if (num == -1) {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }

        function sort_data(col, table_name) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById(table_name);
            switching = true;
            num *= -1;
            while (switching) {

                switching = false;
                rows = table.tBodies;

                for (i = 0; i < (rows.length - 1); i++) {

                    shouldSwitch = false;

                    x = rows[i].getElementsByTagName("TD")[col];
                    y = rows[i + 1].getElementsByTagName("TD")[col];

                    if (num == -1) {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }

                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
        document.getElementById("th-id").addEventListener("click", function() {
            sort_data("0", "dtOrderExample");
        });
        document.getElementById("th-name").addEventListener("click", function() {
            sort_data("1", "dtOrderExample");
        });
    </script>
@endsection
