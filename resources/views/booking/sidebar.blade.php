<nav id="sidebar">
    <div class="sidebar-header">
        <h3 class="uppercase">Booking</h3>
    </div>
    <ul class="lisst-unstyled components">
       
        <li>
           <i class="fas fa-home"></i>
           <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-white hover:no-underline">Thông tin cá nhân</a>
            
           <ul class="collapse list-unstyled subnav" id="homeSubmenu">
              <li>
                  <?php
                    $user = Auth::user();
                  ?>
                  <a href="{{ route('kath.edit', $user->id) }}" class="text-white hover:no-underline">Chỉnh sửa thông tin cá nhân</a>
              </li>
              <li>
                  <a href="{{ route('kath.index') }}" class="text-white hover:no-underline">Thay đổi mật khẩu</a>
              </li>

          </ul>
        </li>
        <li>
           <i class="fas fa-chevron-circle-down"></i>
           <a href="#" class="text-white hover:no-underline">Danh sách công ty</a>
        </li>
        <li>
            <i class="far fa-file-alt"></i>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-white hover:no-underline">Hệ thống phòng họp</a>
            <ul class="collapse list-unstyled subnav" id="pageSubmenu" >
                <li >
                    <a href="#" class="text-white hover:no-underline">Danh sách các phòng</a>
                </li>
                <li>
                    <a href="#" class="text-white hover:no-underline">Đánh giá phòng họp</a>
                </li>
            </ul>
        </li>
      <li>
           <i class="fas fa-paint-brush"></i>
           <a href="#" class="text-white hover:no-underline">Policy</a>
      </li>
      <li>
           <i class="fas fa-mail-bulk"></i>
           <a href="#" class="text-white hover:no-underline">Contact </a>
      </li>
    </ul>

    <div class="text-center bottom-0">PHIÊN BẢN : {{ env('APP_STATIC_VERSION') }}</div>
</nav>