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
            <div class="card">
                <div class="card-header" style="padding: 15px 0px;">
                    <p style="margin: 0px ;margin-left: 10px;">Events List</p>
                </div>
                <div class="card-body" style="height: 500px; padding: 15px 0px;">
                    <div class="select-event">
                        <div class="left-content">
                            <label for="entities" style="margin-left: 10px;">View: </label>
                            <input type="number" name="" id="entities" min="0" max="100" placeholder="1" step="10">
                            <p style="background-color: #321fdb; color: white;" onclick="funct_all(1)">Select all</p>
                            <p style="background-color: #321fdb; color: white; opacity: 0.65; " onclick="funct_all(0)">
                                Deselect</p>
                            <p>Copy</p>
                            <p>CSV</p>
                            <p>Excel</p>
                            <p>PDF</p>
                            <p>Print</p>
                            <p>Column</p>
                            <p style="background-color: #e55353; color: white;">Xóa</p>
                        </div>
                        <div class="right-content">
                            <label for="search">Search:</label>
                            <input type="text" id="search">
                        </div>
                    </div>
                    <div class="scroller" style="height:300px">
                        <table class="table table-striped table-bordered " id="table_to_highlight">
                            <thead align="center">
                                <tr style="background-color: #fff;">
                                    <th></th>
                                    <th id="im-tb-name">Event's Title
                                        <i class="fas fa-sort"></i>
                                    </th>

                                    <th id="im-tb-sdate">Start day
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th id="im-tb-fdate">End day
                                        <i class="fas fa-sort"></i>
                                    </th>
                                    <th>File</th>
                                    <th>&nbsp; </th>
                                </tr>
                            </thead>

                            
                            <tbody>
                                @foreach ($events as $event)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="" id="box3" disabled>
                                    </td>
                                    <td text-align:left>{{$event->name}}</td>
                                    <td>{{$event->starting_time}}</td>
                                    <td>{{$event->ending_time}}</td>
                                    <td>{{$event->file}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ route('events.show', $event->id) }}">
                                            Xem
                                        </a>
                                        <a class="btn btn-xs btn-primary" href="{{ route('event.edit', $event->id) }}">
                                            Sửa
                                        </a>
                                        <a class="btn btn-xs btn-primary" href="{{ route('event.delete', $event->id) }}">
                                            Xóa
                                        </a>
                                    </td>
                                </tr>


                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        $('.email').select2();
    </script>

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

@endsection


