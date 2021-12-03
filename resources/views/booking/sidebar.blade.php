<nav id="sidebar">
    <div class="sidebar-header uppercase font-bold text-center text-2xl" style="height: 70px">
        Trang chủ
    </div>
    <ul class="lisst-unstyled components">
        <li>
            <i class="fas fa-home"></i>
            <a href="/booking" aria-expanded="false" class="text-white hover:no-underline">Nhà của tôi</a>
        </li>

        <li>
           <i class="fas fa-user"></i>
           <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-white hover:no-underline pl-3">Thông tin cá nhân</a>

           <ul class="collapse list-unstyled subnav" id="homeSubmenu">
              <li>
                  <a href="{{ route('kath.edit', Auth::user()->id) }}" class="text-white hover:no-underline">Chỉnh sửa thông tin cá nhân</a>
              </li>
              <li>
                  <a href="{{ route('kath.editPassword', ['id' => Auth::user()->id]) }}" class="text-white hover:no-underline">Thay đổi mật khẩu</a>
              </li>
              <li>
                <a href="{{ route('event.view') }}" class="text-white hover:no-underline">Danh sách sự kiện</a>
            </li>

          </ul>
        </li>
        <li>
           <i class="fas fa-users"></i>
           <a href="{{ route('kath.showUsers') }}" class="text-white hover:no-underline">Danh sách nhân viên</a>
        </li>
        <li>
            <i class="far fa-handshake"></i>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-white hover:no-underline">Hệ thống phòng họp</a>
            <ul class="collapse list-unstyled subnav" id="pageSubmenu" >
                <li>
                    <a href="{{ route('event.create', Auth::user()->id) }}" class="text-white hover:no-underline">Đặt phòng</a>
                </li>
                <li >
                    <a href="{{ route('room.view') }}" class="text-white hover:no-underline">Danh sách phòng họp</a>
                </li>
                <li>
                    <a href="{{ route('event.rate') }}" class="text-white hover:no-underline">Đánh giá phòng họp</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="text-center pb-5">PHIÊN BẢN : {{ env('APP_STATIC_VERSION') }}</div>


    <script>
        $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                        if ($('#sidebarCollapse i').hasClass('fa-angle-double-left')) {
                            $('#sidebarCollapse i').removeClass('fa-angle-double-left');
                            $('#sidebarCollapse i').addClass('fa-angle-double-right');
                        } else if ($('#sidebarCollapse i').hasClass('fa-angle-double-right')){
                            $('#sidebarCollapse i').removeClass('fa-angle-double-right');
                            $('#sidebarCollapse i').addClass('fa-angle-double-left');
                        }
                    });
                });
    </script>
</nav>
