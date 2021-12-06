<!DOCTYPE html>
<html>

<head>
    <title>Event View</title>
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
            overflow: hidden;
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
                <li>
                    <i class="fas fa-home"></i>
                    <a href="#">Management page</a>

                </li>
                <li>
                    <i class="fas fa-chevron-circle-down"></i>
                    <a href="#">Work</a>
                </li>
                <li>
                    <i class="far fa-file-alt"></i>
                    <a>Category</a>
                </li>
                <li>
                    <i class="fas fa-user"></i>
                    <a href="#">Account</a>
                </li>
                <li>
                    <i class="fas fa-cog"></i>
                    <a href="#">Setting </a>
                </li>
            </ul>
        </nav>

        <div id="content">

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
            <a class="btn btn-default" href="{{ route('admin.users') }}">
                Back
            </a>
            <form autocomplete="on" action="" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="card">
                    <div class="card-header text-center uppercase text-xl font-semibold">Personal information</div>
                    <div class="card-body">
                        @if (session()->has('msgUpdateSuccess'))
                            <div class="flex justify-center items-center text-green-700"
                                id="success-notification" style="display: none">
                                <div slot="avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-check-circle w-5 h-5 mx-2">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                                <div class="font-semibold max-w-full text-lg">{{ session()->get('msgUpdateSuccess') }}</div>
                            </div>
                        @endif
                        <div class="text-center"></div>
                        <div class="form-group">
                            <label for="username" class="font-semibold">Full name <span
                                    class="text-red-600">*</span></label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ $user->name }}">
                            @error('name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex gap-4">
                            <label for="gender" class="font-semibold">Gender</label><br>
                            <div>
                                <input type="radio" name="gender" id="male" value="Nam" @if (!empty($user->gender) && $user->gender == 'Nam')
                                checked
                                @endif> Male
                            </div>
                            <div>
                                <input type="radio" name="gender" id="female" value="Nữ" @if (!empty($user->gender) && $user->gender == 'Nữ')
                                checked
                                @endif> Female
                            </div>
                            <div>
                                <input type="radio" name="gender" id="other" value="Khác" @if (!empty($user->gender) && $user->gender == 'Khác')
                                checked
                                @endif> Other
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date" class="font-semibold">Date of birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                                @if (!empty($user->date_of_birth)) value="{{ $user->date_of_birth }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="telephone" class="font-semibold">Phone
                                <span class="text-red-600">*
                                    @if (session()->has('msgPhone'))
                                        <span class="font-normal">{{ session()->get('msgPhone') }}</span>
                                    @endif
                                </span>
                            </label>
                            <input type="tel" class="form-control" name="phone" id="phone"
                                @if (!empty($user->phone)) value="{{ $user->phone }}" @endif>
                            @error('phone')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-semibold">Email
                                <span class="text-red-600">*
                                    @if (session()->has('msgEmail'))
                                        <span class="font-normal">{{ session()->get('msgEmail') }}</span>
                                    @endif
                                </span>
                            </label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ $user->email }}">
                            @error('email')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company" class="font-semibold">Company <span
                                    class="text-red-600">*</span></label>

                            <input type="text" class="form-control" name="company" id="company"
                            @if (!$user->isAdmin) value="{{ $user->company->name}}" @endif
                             readonly>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/web/js/main.js"></script>
    <script type="text/javascript">
        // phần sort các trường lần lượt là id , name , email , company
        document.getElementById('rl-id').addEventListener("click", function(){
            sort_row_int("0", "dtOrderExample");
        });
        document.getElementById('rl-name').addEventListener("click", function(){
            sort_row_string("1", "dtOrderExample");
        });
        document.getElementById('rl-email').addEventListener("click", function(){
            sort_row_string("4", "dtOrderExample");
        });
        document.getElementById('rl-company').addEventListener("click", function(){
            sort_row_string("5", "dtOrderExample");
        });

    </script>
</body>
</html>
