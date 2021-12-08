@extends('admin.layout')

@section('data-table')
    <div class="text-center py-3 font-semibold text-xl uppercase">KATH'S USERS</div>
    <div class="scroller">
        <table class="table table-bordered table-hover admin-table" id="dtOrderExample">
            <thead style="background-color: #343a40" class="table-idea">
                <tr>
                    <th style="width: 7%;">
                        <b class="text-white">ID <i class="fas fa-sort" id="rl-id"></i></b>
                    </th>
                    <th style="width: 15%;">
                        <b class="text-white">Name <i class="fas fa-sort" id="rl-name"></i></b>
                    </th>
                    <th style="width: 13%;">
                        <b class="text-white">Date of birth</b>
                    </th>
                    <th style="width: 15%;">
                        <b class="text-white">Phone number</b>
                    </th>
                    <th style="width: 17%;">
                        <b class="text-white">Email <i class="fas fa-sort" id="rl-email"></i></b>
                    </th>
                    <th style="width: 18%;">
                        <b class="text-white">Company <i class="fas fa-sort" id="rl-company"></i></b>
                    </th>
                    <th style="width: 12%;"><b class="text-white">Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->date_of_birth }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        @if (!$user->isAdmin)
                            <td>{{ $user->company->name }}</td>
                        @else
                            <td> </td>
                        @endif
                        <td style=" color: #6d9886; font-size: 18px;">
                            <a data-toggle="tooltip" title="View" href="{{ route('users.details', $user->id) }}">
                                <i style="margin-right: 10px;" class="fas fa-eye text-blue-600"></i> </a>

                            <a data-toggle="tooltip" title="Delete" @if (!$user->isAdmin)
                                href="{{ route('users.delete', $user->id) }}"
                @endif>
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
        document.getElementById('rl-email').addEventListener("click", function() {
            sort_row_string("4", "dtOrderExample");
        });
        document.getElementById('rl-company').addEventListener("click", function() {
        sort_row_string("5", "dtOrderExample");
        });
        });
    </script>
@endsection
