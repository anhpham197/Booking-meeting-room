<nav id="sidebar">
    <div class="sidebar-header">
        <h3 class="uppercase">Booking</h3>
    </div>
    <ul class="lisst-unstyled components">
       
        <li>
           <i class="fas fa-home"></i>
           <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-white hover:no-underline">Thông tin cá nhân</a>
            
           <ul class="collapse list-unstyled subnav" id="homeSubmenu" >
              <li>
                  <a href="{{ route('edit_profile') }}" class="text-white hover:no-underline">Chỉnh sửa thông tin cá nhân</a>
              </li>
              <li>
                  <a href="{{ route('change_password') }}" class="text-white hover:no-underline">Thay đổi mật khẩu</a>
              </li>

          </ul>
        </li>
        <li>
           <i class="fas fa-chevron-circle-down"></i>
           <a href="#" class="text-white hover:no-underline">About</a>
        </li>
        <li>
            <i class="far fa-file-alt"></i>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-white hover:no-underline">Pages</a>
            <ul class="collapse list-unstyled subnav" id="pageSubmenu" >
                <li >
                    <a href="#" class="text-white hover:no-underline">Page 1</a>
                </li>
                <li>
                    <a href="#" class="text-white hover:no-underline">Page 2</a>
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
</nav>