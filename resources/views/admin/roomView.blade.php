<!DOCTYPE html>
<html>

<head>
    <title>Room View</title>
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
            <a class="btn btn-default" href="{{ route('admin.rooms') }}">
                Back
            </a>
            <form autocomplete="on" action="" method="post">
                <div class="card">
                    <div class="card-header text-center">
                        <b>ROOM MANAGEMENT</b>
                    </div>
                    <div class="card-body" style="height: 415px;">
                        <div class="form-group">
                            <label for="room">Room name</label>
                            <input type="text" class="form-control" name="room" id="room" aria-describedby="roomHid" placeholder="" value="{{ $room->name }}">
                        </div>
                        <div class="form-group">
                            <label for="capacity">Capacity (people)</label>
                            <input type="number" class="form-control" name="capacity" id="capacity" aria-describedby="capacityHid" placeholder="" value="{{ $room->capacity }}">
                        </div>
                        <div class="form-group">
                            <label for="area">Area</label>
                            <input type="number" class="form-control" name="area" id="area" value="{{ $room->area }}">
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div >
                                <label for="tt">Status</label>
                                <select style="width: 200px; height: 30px ;text-align: center;" name="tt" id="" required>
                                    <option value="active">Active</option>
                                    <option value="reparing">Reparing</option>
                                </select>
                            </div>
                            <div>
                                <label for="ttb">Equipment</label>
                                <select style="width: 400px ; height: 30px; text-align: center;" name="ttb" id="" required>
                                    <option value="chair">Chair</option>
                                    <option value="table">Table</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="text-align: center;">
                        <button type="button" class="btn btn-primary" style="height: 40px">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
</body>
</html>