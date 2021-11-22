@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 60px;" >
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="cursor-pointer rounded-md">
                        <i class="fas fa-angle-double-left text-2xl font-normal text-gray-400"></i>    
                    </button>
                    {{-- <div class="justify-center">Trang chủ</div> --}}
                    <div class="relative flex w-full flex-wrap items-stretch"> 
                        <span
                          class="z-10 h-full leading-snug font-normal absolutetext-center text-gray-400 absolute bg-transparent rounded items-center justify-center pl-3 py-2">
                          <i class="fas fa-search"></i>
                        </span>
                        <input type="search" id="search" name="search" class="form-input placeholder-gray-400 w-72 pl-10" placeholder="Tìm kiếm..."
                                style="font-family: 'Font Awesome 5 Free', 'system-ui'; border: 1px solid #4f4f4f" >
                    </div>
                </div>
            </nav>

            <div class="calendar" style="height: 888px;" >
            <iframe src="https://calendar.google.com/calendar/embed?height=614&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FHo_Chi_Minh&src=a2hhbmhyaGlubzE2MDdAZ21haWwuY29t&src=Y19jbGFzc3Jvb21mNDAzMTMzY0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=dmkudmlldG5hbWVzZSNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=Y19jbGFzc3Jvb21iODg0ZWVmNEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%230047a8&color=%230B8043&color=%23c26401&color=%2333B679" style="border:solid 1px #777" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>
            </div>
        </div>
    </div>
@endsection
