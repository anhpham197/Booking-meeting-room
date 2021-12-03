@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 80px;" >
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="footer-main-cl rounded-md">
                        <i class="fas fa-bars p-3"></i>
                    </button>
                    <form action="" method="post" class="flex" class="border border-gray-100">
                        <input type="search" id="search" name="search" class="pl-2 border border-gray-100 rounded-l" onchange="hideIcon(this);" placeholder=" Tìm kiếm"/>
                        <button type="submit" class="bg-blue-400 hover:bg-blue-500 p-3 w-1/5 rounded-r"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </nav>

            <section class="row">
                <div class="col-12">
                    <form autocomplete="on" action="{{route('room.update', [$room->id])}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="card">
                            <div class="card-header text-center">
                                <b>Sửa phòng họp</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="roomName">Tên / Mã số phòng</label>
                                    <input type="text" class="form-control" name="roomName" id="roomName" aria-describedby="roomNameHid" placeholder="" value="{{ $room->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="image">Ảnh hiện tại</label>
                                    <img src="/img/{{$room->image}}" alt="">
                                </div>

                                <div class="form-group">
                                    <label for="image">Đổi ảnh</label>
                                    <input type = "file" name = "image" value="{{ $room->image }}">
                                </div>

                                <div class="form-group">
                                    <label for="capacity">Sức chứa</label>
                                    <input type="number" class="form-control" name="capacity" id="capacity" aria-describedby="capacityHid" placeholder="" value="{{ $room->capacity }}">
                                </div>

                                <div class="form-group">
                                    <label for="textarea">Mô tả</label>
                                    <textarea id="textarea" name="description" class="form-control" rows="5" value="{{ $room->description }}"></textarea>
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: center;">
                                <button type="submit" class="btn btn-success">Lưu phòng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    {{-- </main> --}}


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}
    <script>
        jQuery(document).ready(function() {
            $('#company-select').select2({
                tags: true
            });
        });
    </script>
{{-- </body>
</html> --}}
@endsection
