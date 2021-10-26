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

            <div class="calendar" style="height: 888px;" >
            <iframe src="https://calendar.google.com/calendar/embed?height=614&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FHo_Chi_Minh&src=a2hhbmhyaGlubzE2MDdAZ21haWwuY29t&src=Y19jbGFzc3Jvb21mNDAzMTMzY0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=dmkudmlldG5hbWVzZSNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=Y19jbGFzc3Jvb21iODg0ZWVmNEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%230047a8&color=%230B8043&color=%23c26401&color=%2333B679" style="border:solid 1px #777" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>
            </div>
        </div>
    </div>
@endsection
