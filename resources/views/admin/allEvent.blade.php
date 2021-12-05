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
                <div class="card-body">
                    <div class="scroller" style="height: 390px;">
                        <table class="table table-bordered table-hover" id="dtOrderExample">
                            <thead  >
                                <tr>
                                    <th style="width: 15%;">
                                        <b class = "text-white">Event's Title <i class="fas fa-sort" id="rl-id"></i></b>
                                    </th>
                                    <th style="width: 15%;">
                                        <b class = "text-white">Start day <i class="fas fa-sort" id="rl-name"></i></b>
                                    </th>
                                    <th style="width: 15%;">
                                        <b class = "text-white">End day</b>
                                    </th>
                                    <th style="width: 15%;">
                                        <b class = "text-white">Description</b>
                                    </th>
                                    <th style="width: 15%;">
                                        <b class = "text-white">File <i class="fas fa-sort" id="rl-email"></i></b>
                                    </th>
                                    <th style="width: 13%;">
                                        <b class = "text-white">Note <i class="fas fa-sort" id="rl-company"></i></b>
                                    </th>
                                    <th style="width: 12%;"><b class = "text-white">Operation</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $key => $event)
                                    <tr>
                                        <td text-align:left>{{$event->name}}</td>
                                        <td>{{$event->starting_time}}</td>
                                        <td>{{$event->ending_time}}</td>
                                        <td>{{$event->description}}</td>
                                        <td>{{$event->file}}</td>
                                        <td>{{$event->note}}</td>
                                        <td style=" color: #6d9886; font-size: 18px;">
                                            <a data-toggle="tooltip" title="View"
                                            href="{{ route('events.eventDetails', $event->id) }}"><i class="fa fa-eye"></i></a>
                                            <a data-toggle="tooltip" title="Delete"
                                            href="{{ route('events.delete', $event->id) }}"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
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
