<!DOCTYPE html>
<html>

<head>
    <title>admin-user</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href={{ mix('css/app.css') }}>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <style>
        /* màu của thead */
        .admin-table thead {
            background-color: #343a40;
        }

        /* css cho sidebar */
        #admin-sidebar {
            background-color: #343a40;
            min-width: 250px;
            max-width: 250px;
            color: #fff;
            transition: all 0.3s;
        }

        #admin-sidebar ul li:hover {
            background-color: #1a202c;
        }

        #admin-sidebar ul li:hover>a {
            color: #fff;
        }

        /* css cho header bên phải màn hình */
        .admin-content-header {
            height: 60px;
            background-color: #fff;
            padding: 0px 15px;
        }

        /* css cho cái body chứa input và table bên phải màn hình */
        .admin-content-body {
            padding: 0px 15px;
            background-color: #f1f5f6;
        }

        /* css cho table bên phải màn hình */
        .admin-table {
            background-color: #fff;
            border-radius: 7px;
        }

        /* css cho input search bên phải màn hình */
        .admin-input {
            border-radius: 4px;
            border-width: 1px;
            height: 35px;
        }

        /* lớp này là để đổi màu khi chọn thẻ li */
        .active {
            background-color: #111827;
        }

        #admin-sidebar.active {
            margin-left: -250px;
        }


        #admin-sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #admin-sidebar ul li {
            padding: 10px;
            font-weight: 400;
            display: block;
        }

        #admin-sidebar ul li a:hover {
            cursor: pointer;
        }

        #admin-sidebar ul li a {
            padding: 10px;
            font-weight: 400;
            display: inline-block;
        }

        #admin-sidebar .sidebar-header {
            line-height: 60px;
            text-align: center;
            font-family: 'Merriweather', serif;
            font-family: 'MuseoModerno', cursive;
            color: #058BFF;
            font-weight: 700;
            font-size: 30px;
        }

        .admin-table thead :first-child {
            border-radius: 7px 0 0 0;
        }
        .admin-table thead :last-child {
            border-radius: 0 7px 0 0;
        }
        .admin-table tbody tr:last-child td:first-child{
            border-radius: 0 0 0 7px;
        }
        .admin-table tbody tr:last-child td:last-child{
            border-radius: 0 0 7px 0;
        }

        @media (max-width: 1024px) {
            #admin-sidebar {
                margin-left: -250px;
            }

            #admin-sidebar.active {
                margin-left: 0;
            }

            #sidebarCollapse span {
                display: none;
            }
        }

    </style>
</head>

<body style="background: #f1f5f6">
    <div class="wrapper">
        <nav id="admin-sidebar">
            <div class="sidebar-header" style="background-color: #343a40; height: 60px">
                KATH
            </div>
            <ul>
                <li class="multilevel p-0">
                    <div class="menu_parent py-2 pl-3">
                        <i class="fas fa-chart-bar"></i>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle text-white hover:no-underline pl-3">Statistic</a>
                    </div>

                    <ul class="collapse subnav pl-8" id="homeSubmenu">
                        <li>
                            <a href="{{ route('user.chart') }}" class="text-white hover:no-underline">Users</a>
                        </li>
                        <li>
                            <a href="{{ route('room.chart') }}" class="text-white hover:no-underline">Rooms</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <a href="{{ route('admin.users') }}">Accounts</a>

                </li>
                <li>
                    <i class="fas fa-building"></i>
                    <a href="{{ route('admin.companies') }}">Companies</a>
                </li>
                <li>
                    <i class="fas fa-handshake"></i>
                    <a href="{{ route('admin.events') }}">Meetings</a>
                </li>
                <li>
                    <i class="fas fa-house-damage    "></i>
                    <a href="{{ route('admin.rooms') }}">Rooms</a>
                </li>
                <li>
                    <i class="fas fa-cog"></i>
                    <a href="{{ route('admin.facilities') }}">Facilities</a>
                </li>
            </ul>
        </nav>

        <div id="content" style="min-height: 100vh">
            <nav class="navbar-expand-lg navbar-light admin-content-header flex justify-between items-center">
                <button type="button" id="sidebarCollapse" class="cursor-pointer rounded-md">
                    <i class="fas fa-angle-double-left text-2xl"></i>
                </button>
                <div class="flex gap-4">
                    <span class="font-medium">{{ Auth::user()->name }}</span>

                    <a href="{{ route('logout') }}" class="fas fa-sign-out-alt text-lg" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </div>
            </nav>

            <div class="admin-content-body">
                <div class="relative flex w-full flex-wrap items-stretch py-3">
                    <span
                        class="z-10 h-full leading-snug font-normal absolutetext-center text-gray-400 absolute bg-transparent rounded items-center justify-center pl-3 py-2">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="search" id="search" name="search" class="form-input placeholder-gray-400 w-72 pl-10"
                        placeholder="Search..."
                        style="font-family: 'Font Awesome 5 Free', 'system-ui'; border: 1px solid #4f4f4f">
                </div>

                @yield('data-table');
                {{-- <div>
                    <table class="table table-bordered table-hover admin-table" id="dtOrderExample">
                        <thead>
                            <tr>
                                <th style="width: 7%;">
                                    <b class="text-white">ID <i class="fas fa-sort" id="rl-id"></i></b>
                                </th>
                                <th style="width: 19%;">
                                    <b class="text-white">Name <i class="fas fa-sort" id="rl-name"></i></b>
                                </th>
                                <th style="width: 18%;">
                                    <b class="text-white">Date of birth</b>
                                </th>
                                <th style="width: 15%;">
                                    <b class="text-white">Phone number</b>
                                </th>
                                <th style="width: 17%;">
                                    <b class="text-white">Email <i class="fas fa-sort" id="rl-email"></i></b>
                                </th>
                                <th style="width: 20%;">
                                    <b class="text-white">Company <i class="fas fa-sort" id="rl-company"></i></b>
                                </th>
                                <th style="width: 1%;"><b class="text-white">Operation</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Đặng Minh Hiếu</td>
                                <td>23-12-2021</td>
                                <td>01234567891</span></td>
                                <td>dangminhhieu@gmail.com</td>
                                <td>f</td>
                                <td style=" color: #6d9886; font-size: 18px;">
                                    <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Phạm Ngọc Ánh</td>
                                <td>20-1-2021</td>
                                <td>01234563391</span></td>
                                <td>pna@gmail.com</td>
                                <td>a</td>
                                <td style=" color: #6d9886; font-size: 18px;">
                                    <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Đặng Tiến Khánh</td>
                                <td>23-10-2021</td>
                                <td>0123456781</span></td>
                                <td>dtk@gmail.com</td>
                                <td>m</td>
                                <td style=" color: #6d9886; font-size: 18px;">
                                    <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div> --}}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('ul > li').click(function(e) {
                $('ul > li').removeClass('active');
                $(this).addClass('active');
            });
        });

        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#admin-sidebar').toggleClass('active');
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
</body>

</html>
