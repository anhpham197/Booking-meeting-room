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

            <div>
                <form autocomplete="on" action="" method="post">
                    <div class="card">
                        <div class="card-header text-center">
                            <b>Đánh giá chất lượng phòng họp</b>
                        </div>
                        <div class="card-body">                        
                            <div class="form-group flex justify-between items-center">
                                <div>
                                    <label for="meetingId" style="margin-right: 10px;" class="font-semibold">Cuộc họp  </label>
                                    <select name="meetingId" id="" class="border border-black py-2 px-3 rounded-md">
                                        <option value="405">Bàn giao sản phẩm</option>
                                        <option value="406">Tổng kết cuối năm</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="" style="margin-right: 10px" class="font-semibold">Thời gian  </label>
                                    <input type="text" value="08:00  29/12/2021" readonly class="py-2 px-3 rounded-md border border-black">
                                </div>
                                <div>
                                    <label for="" style="margin-right: 10px;" class="font-semibold">Phòng  </label>
                                    <input type="text" name="" id="" value="405" readonly class="py-2 px-3 rounded-md border border-black w-max-content">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comment" class="font-semibold">Phản hồi </label>
                                <textarea id="comment" class="form-control"></textarea>
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
    <script>
        ClassicEditor
        .create( document.querySelector( '#comment' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection
