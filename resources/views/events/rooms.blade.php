@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content" class="leading-snug">
            <nav class="navbar navbar-light bg-light flex justify-between" style="height: 70px;">
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="cursor-pointer rounded-md">
                        <i class="fas fa-angle-double-left text-2xl font-normal text-gray-400"></i>
                    </button>
                </div>
                <div class="text-black font-semibold flex gap-2 items-center py-2 px-3 rounded-md" style="background: #D9CAB3">
                    <i class="far fa-clock text-lg"></i>
                    <span id="ct"></span>
                </div>
            </nav>

            <div class="py-3 text-center text-xl font-semibold uppercase">KATH'S MEETING ROOMS</div>

            <div class="px-2 max-w-full overflow-x-auto relative table-responsive">
                <table class="table table-hover table-bordered table-sm" id="dtOrderExample">
                    <thead class="table-idea">
                        <tr>
                            <th>
                                <span style="margin-right: 2px;" class="uppercase font-semibold">Room</span>
                                <i class="fas fa-sort" id="rl-name"></i>
                            </th>
                            <th>
                                <span style="margin-right: 2px;" class="uppercase font-semibold">Capacity</span>
                                <i class="fas fa-sort" id="rl-sc"></i>
                            </th>
                            <th>
                                <span style="margin-right: 2px;" class="uppercase font-semibold">Area</span>
                                <i class="fas fa-sort" id="rl-sp"></i>
                            </th>
                            <th>
                                <span style="margin-right: 2px;" class="uppercase font-semibold">Status</span>
                                <i class="fas fa-sort" id="rl-mood"></i>
                            </th>
                            <th class="uppercase font-semibold">Facilities</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($rooms as $room)
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
                                    <div class=" text-white rounded-md inline-flex mb-2 bg-cool-gray-400 py-1 px-2"
                                        style="font-weight: 400">
                                        {{ $facility->name }}</div>
                                @endforeach
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pb-2">{{ $rooms->links() }}</div>
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
