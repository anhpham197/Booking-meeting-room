@extends('admin.layout')
@section('data-table')
    <div class="text-center py-3 font-semibold text-xl uppercase">ROOM MANAGEMENT</div>
    <div class="scroller">
        <button class="float-right py-2 px-3 rounded-md text-white font-semibold mb-3 bg-blue-500">
            <a href="{{ route('rooms.create')}}" class="text-white">Add new room</a>
        </button>
        <table class="table table-bordered table-hover text-center table-sm admin-table" id="dtOrderExample">
            <thead style="background-color: #343a40" class="table-idea">
                <tr>
                    <th style="width: 6%;">
                        <b class = "text-white">ID <i class="fas fa-sort" id="rl-id"></i></b>
                    </th>
                    <th style="width: 10%;">
                        <b class = "text-white">Room <i class="fas fa-sort" id="rl-name"></i></b>
                    </th>
                    <th style="width: 13%;">
                        <b class = "text-white">Capacity <i class="fas fa-sort" id="rl-capacity"></i></b>
                    </th>
                    <th style="width: 13%;">
                        <b class = "text-white">Area <i class="fas fa-sort" id="rl-area"></i></b>
                    </th>
                    <th style="width: 13%;">
                        <b class = "text-white">Status</b>
                    </th>
                    <th style="width: 33%;">
                        <b class = "text-white">Facilities</b>
                    </th>
                    <th style="width: 12%;"><b class = "text-white">Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td style="font-weight: 400;">Room {{ $room->name }}</td>
                        <td>{{ $room->capacity }} people</td>
                        <td>{{ $room->area }} m<sup>2</sup> </td>
                        <td>
                            @if ($room->status == 'Active')
                                <div class="text-white bg-green-500 py-1 px-2 rounded-md font-semibold">
                                    {{ $room->status }}</div>
                            @elseif ($room->status == 'Repairing')
                                <div class="text-white bg-red-500 py-1 px-2 rounded-md font-semibold block">
                                    {{ $room->status }}</div>
                            @endif
                        </td>
                        <td>
                            @foreach ($room->facilities as $facility)
                                <div class=" text-white rounded-md inline-flex mb-2 bg-cool-gray-400 py-1 px-2" style="font-weight: 400">
                                    {{ $facility->name }}</div>
                            @endforeach
                        </td>
                        <td style="font-size: 18px;">
                            <a data-toggle="tooltip" title="Edit" href="{{ route('rooms.edit', $room->id) }}">
                                <i style="margin-right: 10px;" class="fas fa-edit text-blue-600"></i></a>
                            <a data-toggle="tooltip" title="Delete" href="{{ route('rooms.delete', $room->id) }}">
                                <i class="fas fa-trash-alt text-red-600"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
        document.getElementById('rl-id').addEventListener("click", function() {
            sort_row_int("0", "dtOrderExample");
        });
        document.getElementById('rl-name').addEventListener("click", function() {
            sort_row_string("1", "dtOrderExample");
        });
        document.getElementById('rl-capacity').addEventListener("click", function() {
            sort_row_int("2", "dtOrderExample");
        });
        document.getElementById('rl-area').addEventListener("click", function() {
            sort_row_string("3", "dtOrderExample");
        });
    </script>
@endsection
