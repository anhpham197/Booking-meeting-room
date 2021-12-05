<!DOCTYPE html>
<html>
<head>
	<title>KATH</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <style>
        /* màu của thead */
        thead{
            background-color: #343a40;
        }

        /* css cho sidebar */
        #sidebar{
            background-color: #343a40;
        }
        #sidebar ul li:hover{
            background-color: #1a202c;
        }
        #sidebar ul li:hover> a  {
            color : #fff;
        }
    </style>
</head>

<body>
    <div class="wrapper" >
        <nav id="sidebar">
            <div class="sidebar-header" style="background-color: #343a40;">
                <h3>Booking</h3>
            </div>
            <ul class="lisst-unstyled components">
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

            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 70px;">
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="cursor-pointer rounded-md">
                        <i class="fas fa-angle-double-left text-2xl font-normal text-gray-400"></i>
                    </button>
                    <div class="relative flex w-full flex-wrap items-stretch">
                        <span
                            class="z-10 h-full leading-snug font-normal absolutetext-center text-gray-400 absolute bg-transparent rounded items-center justify-center pl-3 py-2">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="search" id="search" name="search" class="form-input placeholder-gray-400 w-72 pl-10"
                            placeholder="Search..."
                            style="font-family: 'Font Awesome 5 Free', 'system-ui'; border: 1px solid #4f4f4f">
                    </div>
                </div>
            </nav>
            <div class="card">
                <div class="card-header" style="margin-bottom: 0px;" >
                    <input type="text" placeholder="Search">
                </div>
                <div class="card-header text-center text-xl font-semibold uppercase">Event Detail</div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.events') }}">
                                Back
                            </a>
                            <table class="table table-bordered table-striped" id="dtOrderExample">
                                <tbody>
                                    <tr>
                                        <th>
                                            <b>Event's Title</b>
                                        </th>
                                        <td>
                                            {{ $event->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>ID</b>
                                        </th>
                                        <td>
                                            {{ $event->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Room ID</b>
                                        </th>
                                        <td>
                                            {{ $event->room_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Reservation Holder</b>
                                        </th>
                                        <td>
                                            {{ $event->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Starting Time</b>
                                        </th>
                                        <td>
                                            {{ $event->start_day }}
                                        </td>
                                    </tr>
                                    <tr>
                                    <th>
                                        <b>Ending Time</b>
                                    </th>
                                    <td>
                                        {{ $event->end_day }}
                                    </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Description</b>
                                        </th>
                                        <td>
                                            {{ $event->description }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>File</b>
                                        </th>
                                        <td>
                                            {{ $event->file }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <b>Note</b>
                                        </th>
                                        <td>
                                            {{ $event->note }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="height: 56px;">
                </div>

            </div>
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
