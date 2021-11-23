@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('booking.sidebar')
    <div id="content" class="leading-snug">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 70px;" >
            <div class="flex gap-6">
                <button type="button" id="sidebarCollapse" class="cursor-pointer rounded-md">
                    <i class="fas fa-angle-double-left text-2xl font-normal text-gray-400"></i>    
                </button>
                {{-- <div class="justify-center">Trang chủ</div> --}}
                <div class="relative flex w-full flex-wrap items-stretch"> 
                    <span
                      class="z-10 h-full leading-snug font-normal absolutetext-center text-gray-400 absolute bg-transparent rounded items-center justify-center pl-3 py-2">
                      <i class="fas fa-search"></i>
                    </span>
                    <input type="search" id="search" name="search" class="form-input placeholder-gray-400 w-72 pl-10" placeholder="Tìm kiếm..."
                            style="font-family: 'Font Awesome 5 Free', 'system-ui'; border: 1px solid #4f4f4f" >
                </div>
            </div>
        </nav>

        <div class="text-center py-3 font-semibold text-xl uppercase">{{ Auth::user()->company->name}}</div>

        <div>
            <table id="dtOrderExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" style="text-align: center;">
                <thead>
                  <tr class="table-idea">
                    <th id="th-id" class="uppercase">Mã nhân viên</th>
                    <th id="th-name" class="uppercase">Họ và tên</th>
                    <th id="th-mail" class="uppercase">Email</th>
                    <th id="th-meeting" class="uppercase" colspan="3">Lịch họp
                    </th>
                  </tr>
                  <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Ngày</th>
                      <th>Giờ</th>
                      <th>Cuộc họp</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)   
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>09:11</td>
                            <td>27/11/2021</td>
                            <td>Họp cuối năm</td>
                        </tr>
                    @endforeach
                </tbody> 
              </table>
        </div>
    </div>

    <script>
        function sort_name(col){
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("dtOrderExample");
            switching = true;
    
            while (switching) {
            
                switching = false;
                rows = table.rows;
            
                for (i = 1; i < (rows.length - 1); i++) {
                
                shouldSwitch = false;
                
                x = rows[i].getElementsByTagName("TD")[col];
                y = rows[i + 1].getElementsByTagName("TD")[col];
                
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                
                    shouldSwitch = true;
                    break;
                }
                }
                if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                }
            }
         }
        document.getElementById("th-name").addEventListener("click", function(){
            sort_name("0");
        });
        document.getElementById("th-mail").addEventListener("click", function(){
            sort_name("1");
        });
        document.getElementById("th-id").addEventListener("click", function(){
            sort_name("2");
        });
    </script>
@endsection