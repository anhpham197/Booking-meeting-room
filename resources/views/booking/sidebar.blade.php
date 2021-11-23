<nav id="sidebar">
    <div class="sidebar-header">
    </div>
    <ul class="lisst-unstyled components">
        <li>
            <i class="fas fa-home"></i>
            <a href="/booking" aria-expanded="false" class="text-white hover:no-underline">Nhà của tôi</a>
        </li>

        <li>
           <i class="fas fa-user"></i>
           <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-white hover:no-underline pl-3g">Thông tin cá nhân</a>
            
           <ul class="collapse list-unstyled subnav" id="homeSubmenu">
              <li>
                  <a href="{{ route('kath.edit', Auth::user()->id) }}" class="text-white hover:no-underline">Chỉnh sửa thông tin cá nhân</a>
              </li>
              <li>
                  <a href="{{ route('kath.editPassword', ['id' => Auth::user()->id]) }}" class="text-white hover:no-underline">Thay đổi mật khẩu</a>
              </li>

          </ul>
        </li>
        <li>
            {{-- fa-chevron-circle-down --}}
           <i class="fas fa-users"></i>
           <a href="#" class="text-white hover:no-underline">Danh sách nhân viên</a>
        </li>
        <li>
            <i class="far fa-handshake"></i>            
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-white hover:no-underline">Hệ thống phòng họp</a>
            <ul class="collapse list-unstyled subnav" id="pageSubmenu" >
                <li>
                    <a href="{{ route('event.create') }}" class="text-white hover:no-underline">Đặt phòng</a>
                </li>
                <li >
                    <a href="#" class="text-white hover:no-underline">Danh sách các phòng</a>
                </li>
                <li>
                    <a href="#" class="text-white hover:no-underline">Đánh giá phòng họp</a>
                </li>
            </ul>
        </li>
      {{-- <li>
           <i class="fas fa-paint-brush"></i>
           <a href="#" class="text-white hover:no-underline">Policy</a>
      </li>
      <li>
           <i class="fas fa-mail-bulk"></i>
           <a href="#" class="text-white hover:no-underline">Contact </a>
      </li> --}}
    </ul>

    <div class="text-center bottom-0">PHIÊN BẢN : {{ env('APP_STATIC_VERSION') }}</div>

    
    <script>
        $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                    });
                });
    </script>
</nav>