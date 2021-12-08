@extends('admin.layout')
@section('data-table')
    <div class="text-center py-3 font-semibold text-xl uppercase">COMPANIES MANAGEMENT</div>
    <div class="scroller">
        <table class="table table-bordered table-hover admin-table" id="dtOrderExample">
            <thead style="background-color: #343a40" class="table-idea">
                <tr>
                    <th style="width: 7%;">
                        <b class="text-white">ID <i class="fas fa-sort" id="rl-id"></i></b>
                    </th>
                    <th style="width: 81%;">
                        <b class="text-white">Company name <i class="fas fa-sort" id="rl-name"></i></b>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $key => $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
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



