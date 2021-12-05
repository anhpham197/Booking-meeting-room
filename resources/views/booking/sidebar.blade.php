<nav id="sidebar">
    <div class="flex justify-center align-middle py-1" style="height: 70px;">
        <img src="{{ asset('img/logo.png') }}" alt="logo" width="60px" height="60px">
    </div>
    <ul id="menu">
        <li class="p-0"> 
            <div class="pl-3 py-2">
                <i class="fas fa-home"></i>
                <a href="/booking" aria-expanded="false" class="text-white hover:no-underline flex gap-3">My calendar</a>
            </div>
        </li>

        <li class="multilevel p-0">
            <div class="menu_parent py-2 pl-3">
                <i class="fas fa-user"></i>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle text-white hover:no-underline pl-3">Personal information</a>
            </div>

            <ul class="collapse subnav pl-8" id="homeSubmenu">
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

            </ul>
        </li>
        <li class="p-0">
            <div class="pl-3 py-2">
                <i class="fas fa-users"></i>
                <a href="{{ route('kath.showUsers') }}" class="text-white hover:no-underline">Employees</a>
            </div>
        </li>
        <li class="multilevel p-0">
            <div class="menu_parent py-2 pl-3">
                <i class="far fa-handshake"></i>
                <a href="#pageSubmenu" data-toggle="collapse"
                    class="dropdown-toggle text-white hover:no-underline">Meeting room system</a>
            </div>
            <ul class="collapse subnav pl-8" id="pageSubmenu">
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

    <div class="text-center pb-5 font-semibold">VERSION : {{ env('APP_STATIC_VERSION') }}</div>


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

        $('ul#menu a').each(function() {
            let href = $(this).attr('href');
            if (window.location.href.includes(href)) {
                $(this).parents('.multilevel').addClass('open');
                if($(this).parent().parent().parent().hasClass('multilevel')) {
                    $(this).parent().parent().prev().addClass('menu-active').addClass('border-red-700').removeClass('border-transparent');
                } else {
                    $(this).parent().addClass('menu-active').addClass('border-red-700').removeClass('border-transparent');
                }
            }
        });

        $('#menu').on("click", ".multilevel", function() {
            $('.multilevel').removeClass('open');
            $(this).toggleClass('open');
            // $('.menu a[href="' + window.location.href + '"]').addClass('bg-gray-900').parent().addClass('border-red-700').removeClass('border-transparent');
        });
    </script>
</nav>
