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
                </div>
            </nav> 

            <div class="card-header text-center text-xl font-semibold uppercase">Danh sách phòng họp</div>
            
            <div class="">
                <div class="scroller" style="height: 427px;">
                    <table class="table table-bordered table-hover text-center" id="dtOrderExample">
                        <thead>
                            <tr>
                                <th>
                                    <b style="margin-right: 5px;">Tên phòng</b>
                                    <i class="fas fa-sort" id="rl-name"></i>
                                </th>
                                <th>
                                    <b style="margin-right: 5px;">Sức chứa</b>
                                    <i class="fas fa-sort" id="rl-sc"></i>
                                </th>
                                <th>
                                    <b style="margin-right: 5px;">Diện tích</b>
                                    <i class="fas fa-sort" id="rl-sp"></i>
                                </th>
                                <th>
                                    <b style="margin-right: 5px;">Tình trạng</b>
                                    <i class="fas fa-sort" id="rl-mood"></i>
                                </th>
                                <th><b>Trang thiết bị</b></th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($rooms as $room)
                                <td style="font-weight: 400;">Phòng {{ $room->name }}</td>
                                <td>{{ $room->capacity }} người</td>
                                <td>{{ $room->area }} m<sup>2</sup> </td>
                                <td>
                                    @if ($room->status == 'Hoạt động')
                                        <div class="text-white bg-green-500 py-2 px-2 rounded-md font-semibold">
                                            {{ $room->status }}</div>
                                    @elseif ($room->status == 'Đang sửa chữa')
                                        <div class="text-white bg-gray-400 py-2 px-2 rounded-md font-semibold block">
                                            {{ $room->status }}</div>
                                    @endif
                                </td>
                                <td class="">
                                    @foreach ($room->facilities as $facility)
                                        <div class=" text-white label-info inline-flex mb-2" style="font-weight: 400">
                                            {{ $facility->name }}</div>
                                    @endforeach
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            // num là để chọn chiều lọc data
            var num = 1;
            // sort data
            // sort cho dạng string
            function sort_row_string(col, table_name) {
                var table, rows, switching, i, x, y, shouldSwitch;
                table = document.getElementById(table_name);
                switching = true;
                num *= -1;
                while (switching) {

                    switching = false;
                    rows = table.rows;

                    for (i = 1; i < (rows.length - 1); i++) {

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

            // sort cho dạng int
            function sort_row_int(col, table_name) {
                var table, rows, switching, i, x, y, shouldSwitch;
                table = document.getElementById(table_name);
                switching = true;
                num *= -1;
                while (switching) {

                    switching = false;
                    rows = table.rows;

                    for (i = 1; i < (rows.length - 1); i++) {

                        shouldSwitch = false;

                        x = rows[i].getElementsByTagName("TD")[col];
                        y = rows[i + 1].getElementsByTagName("TD")[col];

                        if (num == -1) {
                            if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
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
            document.getElementById('rl-name').addEventListener("click", function() {
                sort_row_string("0", "dtOrderExample");
            });
            document.getElementById('rl-sc').addEventListener("click", function() {
                sort_row_int("1", "dtOrderExample");
            });
            document.getElementById('rl-sp').addEventListener("click", function() {
                sort_row_int("2", "dtOrderExample");
            });
            document.getElementById('rl-mood').addEventListener("click", function() {
                sort_row_string("3", "dtOrderExample");
            });
        </script>
    @endsection
