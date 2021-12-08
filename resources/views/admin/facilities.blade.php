@extends('admin.layout')
@section('data-table')
    <div class="text-center py-3 font-semibold text-xl uppercase">FACILITIES MANAGEMENT</div>
    <div class="scroller">
        <button class="float-right py-2 px-3 rounded-md text-white font-semibold mb-3 bg-blue-500">
            <a href="{{ route('facilities.create')}}" class="text-white">Add new facility</a>
        </button>
        <table class="table table-bordered table-hover text-center table-sm admin-table" id="dtOrderExample">
            <thead class="table-idea">
                <tr>
                    <th style="width: 6%;">
                        <b class = "text-white">ID <i class="fas fa-sort" id="rl-id"></i></b>
                    </th>
                    <th style="width: 82%;">
                        <b class = "text-white">Name <i class="fas fa-sort" id="rl-name"></i></b>
                    </th>
                    <th style="width: 12%;"><b class = "text-white">Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facilities as $facility)
                    <tr>
                        <td>{{ $facility->id }}</td>
                        <td style="font-weight: 400;">{{ $facility->name }}</td>

                        <td style=" color: #6d9886; font-size: 18px;">
                            <a data-toggle="tooltip" title="Delete" href="{{ route('facilities.delete', $facility->id) }}">
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
    </script>
@endsection

        