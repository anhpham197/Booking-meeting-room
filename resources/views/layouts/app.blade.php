<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KATH') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>


    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{-- Nếu muốn dùng file ngoài thì như này nhé, ko cần mix, ko cần chạy npm  --}}
    <link rel="stylesheet" href="/css/style_for_article.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois+Shadow&family=Londrina+Shadow&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">

    <!-- Icon FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}"/>
    <script src="{{ asset('select2/js/select2.min.js') }}"></script>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class=" py-3 sticky top-0 z-10">
            <div class="px-16 mx-auto md:flex justify-between items-center">
                <div class="text-center ml6 sm:pb-4 md:pb-0">
                    <a href="{{ url('/') }}" class="text-4xl text-gray-300 letters font-logo uppercase font-semibold">
                        KATH meeting room
                    </a>
                </div>
                <nav class="space-x-4 text-sm sm:text-base text-center">
                    <a class="hover:font-bold hover:no-underline hover:text-gray-300 uppercase text-gray-300" href="{{ route('show_booking') }}">Đặt phòng</a>

                    @guest
                        <a class="hover:font-bold hover:no-underline hover:text-gray-300 uppercase text-gray-300" href="{{ route('login') }}">Đăng nhập</a>
                        @if (Route::has('register'))
                            <a class="hover:font-bold hover:no-underline hover:text-gray-300 uppercase text-gray-300" href="{{ route('register') }}">Đăng ký</a>
                        @endif
                    @else
                        <span class="text-gray-300 font-medium">{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="hover:font-bold hover:no-underline hover:text-gray-300 uppercase text-gray-300 fas fa-sign-out-alt text-lg"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        <div class="z-0">
            @yield('content')
        </div>

        <div class="z-0">
            @include('layouts.footer')
        </div>
    </div>

    <script>
        var textWrapper = document.querySelector('.ml6 .letters');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: true})
        .add({
            targets: '.ml6 .letter',
            translateY: ["1.1em", 0],
            translateZ: 0,
            duration: 750,
            delay: (el, i) => 50 * i
        }).
        add({
            targets: '.ml6',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
