@extends('admin.layout')
@section('data-table')
    <div class="text-center py-3 font-semibold text-xl uppercase">MEETINGS MANAGEMENT</div>
    <div class="scroller">
        <table class="table table-bordered table-hover admin-table" id="dtOrderExample">
            <thead style="background-color: #343a40" class="table-idea">
                <tr>
                    <th style="width: 3%;">
                        <b class="text-white">ID</b>
                    </th>
                    <th style="width: 15%;">
                        <b class="text-white">Event name</b>
                    </th>
                    <th style="width: 7%;">
                        <b class="text-white">Room</b>
                    </th>
                    <th style="width: 15%;">
                        <b class="text-white">Start time <i class="fas fa-sort" id="rl-start"></i></b>
                    </th>
                    <th style="width: 15%;">
                        <b class="text-white">End time <i class="fas fa-sort" id="rl-end"></i></b>
                    </th>
                    <th style="width:20%;">
                        <b class="text-white">Note</b>
                    </th>
                    <th style="width: 10%;"><b class="text-white">Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $key => $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td text-align:left>{{ $event->name }}</td>
                        <td>{{ $rooms->find($event->room_id)->name }}</td>
                        <td>{{ $event->starting_time }}</td>
                        <td>{{ $event->ending_time }}</td>
                        <td>{{ $event->note }}</td>
                        <td style="font-size: 18px;">
                            <a data-toggle="tooltip" title="View" href="{{ route('events.details', $event->id) }}">
                                <i style="margin-right: 10px;" class="fas fa-eye text-blue-600"></i> </a>

                            <a data-toggle="tooltip" title="Delete" href="{{ route('events.delete', $event->id) }}">
                                <i class="fas fa-trash-alt text-red-600"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('ul > li').click(function(e) {
                $('ul > li').removeClass('active');
                $(this).addClass('active');
            });
        });
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
        document.getElementById('rl-start').addEventListener("click", function() {
            sort_row_string("3", "dtOrderExample");
        });
        document.getElementById('rl-end').addEventListener("click", function() {
            sort_row_string("4", "dtOrderExample");
        });
    </script>
@endsection
