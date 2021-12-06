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
            <a class="btn btn-default" href="{{ route('admin.events') }}">
                Back
            </a>
            <form autocomplete="on" action="" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header text-center uppercase text-xl font-semibold">EVENT MANAGEMENT
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="usernameBooking" class="font-semibold">Full name <span class="text-red-600">*</span></label>
                            <input type="text" class="form-control" name="usernameBooking" id="usernameBooking" aria-describedby="usernameBookingHid" required readonly value="{{ Auth::user()->name }}">
                        </div>

                        <div class="form-group">
                            <label for="telephoneBooking" class="font-semibold">Phone <span class="text-red-600">*</span></label>
                            <input type="tel" class="form-control" name="telephoneBooking" id="telephoneBooking" aria-describedby="telephoneBookingHid" required value="{{ Auth::user()->phone }}">
                        </div>

                        <div class="form-group">
                            <label for="emailBooking" class="font-semibold">Email <span class="text-red-600">*</span></label>
                            <input type="email" class="form-control" name="emailBooking" id="emailBooking" aria-describedby="emailBookingHid" value="{{ Auth::user()->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="title" class="font-semibold">Meeting name <span class="text-red-600">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $event->name }}" required>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="booking_date_start" class="font-semibold">Starting time <span class="text-red-600">*</span></label>
                                    <input type="datetime-local" min="{{ $minDate }}" class="form-control" name="starting_time" id="starting_time" value="{{ date('Y-m-d\TH:i', strtotime($event->starting_time)) }}" required>
                                </div>
                                <div class="col">
                                    <label for="time_start" class="font-semibold">Ending time <span class="text-red-600">*</span></label>
                                    <input type="datetime-local" min="{{ $minDate }}" class="form-control" name="ending_time" id="ending_time" value="{{ date('Y-m-d\TH:i', strtotime($event->ending_time)) }}" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="roomId" class="font-semibold">Room name <span class="text-red-600">*</span></label>
                            <select name="roomId" class="form-control" id="roomId" required>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" @if ($event->room_id == $room->id)
                                        selected
                                    @endif>{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email" class="font-semibold">Attendees' email <span class="text-red-600">*</span></label>
                            <select class="form-control email" multiple="multiple" style="height: 40px" name="emails[]" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @foreach ($event->users as $userJoin)
                                        @if ($userJoin->id == $user->id)
                                            selected
                                        @endif
                                    @endforeach>{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="textarea" class="font-semibold">Meeting agenda</label>
                            <textarea id="textarea1" name="description" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="fileupload" class="font-semibold">Attached file</label>
                            <input type="file" name="fileupload" >
                        </div>

                        <div class="form-group">
                            <label for="textarea" class="font-semibold">Note for us</label>
                            <textarea id="textarea2" name="note" class="form-control" rows="5" placeholder="Let us know if you need anything..."></textarea>
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
