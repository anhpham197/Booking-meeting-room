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

            <div>
                <form autocomplete="on" action="" method="post">
                    <div class="card">
                        <div class="card-header text-center">
                            <b>Đánh giá chất lượng phòng họp</b>
                        </div>
                        <div class="card-body">                        
                            <div class="form-group">
                                <label for="meetingId" style="margin-right: 10px;">Cuộc họp : </label>
                                <select name="meetingId" id="">
                                    <option value="405">phòng họp của Ánh</option>
                                    <option value="406">phòng họp của Hiếu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comment">Phản hồi :</label>
                                <textarea id="comment" class="form-control" rows="11"></textarea>
                            </div>  
                        </div>            
                        <div class="card-footer" style="text-align: center;">
                            <button type="button" class="btn btn-primary">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
