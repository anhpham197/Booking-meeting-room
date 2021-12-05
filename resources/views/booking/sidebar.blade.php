<nav id="sidebar">
    <div class="sidebar-header uppercase font-bold text-center text-2xl" style="height: 70px">
        HOMEPAGE
    </div>
    <ul class="lisst-unstyled components">
        <li>
            <i class="fas fa-home"></i>
            <a href="/booking" aria-expanded="false" class="text-white hover:no-underline">My calendar</a>
        </li>

        <li>
            <i class="fas fa-user"></i>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-white hover:no-underline pl-3">Personal information</a>

<<<<<<< HEAD
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
=======
            <ul class="collapse list-unstyled subnav" id="homeSubmenu">
                <li>
                    <a href="{{ route('kath.edit', Auth::user()->id) }}" class="text-white hover:no-underline">Edit
                        profile</a>
                </li>
                <li>
                    <a href="{{ route('kath.editPassword', ['id' => Auth::user()->id]) }}"
                        class="text-white hover:no-underline">Change password</a>
                </li>
                <li>
                    <a href="{{ route('event.view') }}" class="text-white hover:no-underline">My meetings</a>
                </li>
>>>>>>> 54733b9f62c114bedd32444b7dbd6507e8348d3a

            </ul>
        </li>
        <li>
            <i class="fas fa-users"></i>
            <a href="{{ route('kath.showUsers') }}" class="text-white hover:no-underline">Employees</a>
        </li>
        <li>
            <i class="far fa-handshake"></i>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle text-white hover:no-underline">Meeting room system</a>
            <ul class="collapse list-unstyled subnav" id="pageSubmenu">
                <li>
                    <a href="{{ route('event.create', Auth::user()->id) }}"
                        class="text-white hover:no-underline">Booking room</a>
                </li>
                <li>
                    <a href="{{ route('kath.showRooms') }}" class="text-white hover:no-underline">Meeting rooms</a>
                </li>
                <li>
                    <a href="{{ route('event.rate') }}" class="text-white hover:no-underline">Feedback</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="text-center pb-5">VERSION : {{ env('APP_STATIC_VERSION') }}</div>


    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                if ($('#sidebarCollapse i').hasClass('fa-angle-double-left')) {
                    $('#sidebarCollapse i').removeClass('fa-angle-double-left');
                    $('#sidebarCollapse i').addClass('fa-angle-double-right');
                } else if ($('#sidebarCollapse i').hasClass('fa-angle-double-right')) {
                    $('#sidebarCollapse i').removeClass('fa-angle-double-right');
                    $('#sidebarCollapse i').addClass('fa-angle-double-left');
                }
            });
        });
    </script>
</nav>
