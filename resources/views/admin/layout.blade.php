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
                            placeholder="Tìm kiếm..."
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
                                    <th style="width: 7%;">
                                        <b class = "text-white">ID <i class="fas fa-sort" id="rl-id"></i></b> 
                                    </th>
                                    <th style="width: 15%;">
                                        <b class = "text-white">Name <i class="fas fa-sort" id="rl-name"></i></b>
                                    </th>
                                    <th style="width: 13%;">
                                        <b class = "text-white">Date of birth</b>
                                    </th>
                                    <th style="width: 15%;">
                                        <b class = "text-white">Phone number</b>
                                    </th>
                                    <th style="width: 17%;">
                                        <b class = "text-white">Email <i class="fas fa-sort" id="rl-email"></i></b>
                                    </th>
                                    <th style="width: 18%;">
                                        <b class = "text-white">Company <i class="fas fa-sort" id="rl-company"></i></b>
                                    </th>
                                    <th style="width: 12%;"><b class = "text-white">Operation</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td >1</td>
                                    <td>Đặng Minh Hiếu</td>
                                    <td>23-12-2021</td>
                                    <td>01234567891</span></td>
                                    <td>dangminhhieu@gmail.com</td>
                                    <td >f</td>
                                    <td style=" color: #6d9886; font-size: 18px;">
                                        <a data-toggle="tooltip" title="Edit"><i style="margin-right: 10px;" class="fas fa-user-edit"></i> </a>
                                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td >2</td>
                                    <td>Phạm Ngọc Ánh</td>
                                    <td>20-1-2021</td>
                                    <td>01234563391</span></td>
                                    <td>pna@gmail.com</td>
                                    <td >a</td>
                                    <td style=" color: #6d9886; font-size: 18px;">
                                        <a data-toggle="tooltip" title="Edit"><i style="margin-right: 10px;" class="fas fa-user-edit"></i> </a>
                                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td >3</td>
                                    <td>Đặng Tiến Khánh</td>
                                    <td>23-10-2021</td>
                                    <td>0123456781</span></td>
                                    <td>dtk@gmail.com</td>
                                    <td >m</td>
                                    <td style=" color: #6d9886; font-size: 18px;">
                                        <a data-toggle="tooltip" title="Edit"><i style="margin-right: 10px;" class="fas fa-user-edit"></i> </a>
                                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td >4</td>
                                    <td>Đặng Tiến 1</td>
                                    <td>23-10-2021</td>
                                    <td>0123456781</span></td>
                                    <td>dtk@gmail.com</td>
                                    <td >m</td>
                                    <td style=" color: #6d9886; font-size: 18px;">
                                        <a data-toggle="tooltip" title="Edit"><i style="margin-right: 10px;" class="fas fa-user-edit"></i> </a>
                                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td >5</td>
                                    <td>Đặng Tiến 1</td>
                                    <td>23-10-2021</td>
                                    <td>0123456781</span></td>
                                    <td>dtk@gmail.com</td>
                                    <td >m</td>
                                    <td style=" color: #6d9886; font-size: 18px;">
                                        <a data-toggle="tooltip" title="Edit"><i style="margin-right: 10px;" class="fas fa-user-edit"></i> </a>
                                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td >6</td>
                                    <td>Đặng Tiến 1</td>
                                    <td>23-10-2021</td>
                                    <td>0123456781</span></td>
                                    <td>dtk@gmail.com</td>
                                    <td >m</td>
                                    <td style=" color: #6d9886; font-size: 18px;">
                                        <a data-toggle="tooltip" title="Edit"><i style="margin-right: 10px;" class="fas fa-user-edit"></i> </a>
                                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td >7</td>
                                    <td>Đặng Tiến 1</td>
                                    <td>23-10-2021</td>
                                    <td>0123456781</span></td>
                                    <td>dtk@gmail.com</td>
                                    <td >m</td>
                                    <td style=" color: #6d9886; font-size: 18px;">
                                        <a data-toggle="tooltip" title="Edit"><i style="margin-right: 10px;" class="fas fa-user-edit"></i> </a>
                                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td >8</td>
                                    <td>Đặng Tiến 1</td>
                                    <td>23-10-2021</td>
                                    <td>0123456781</span></td>
                                    <td>dtk@gmail.com</td>
                                    <td >m</td>
                                    <td style=" color: #6d9886; font-size: 18px;">
                                        <a data-toggle="tooltip" title="Edit"><i style="margin-right: 10px;" class="fas fa-user-edit"></i> </a>
                                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td >9</td>
                                    <td>Đặng Tiến 1</td>
                                    <td>23-10-2021</td>
                                    <td>0123456781</span></td>
                                    <td>dtk@gmail.com</td>
                                    <td >m</td>
                                    <td style=" color: #6d9886; font-size: 18px;">
                                        <a data-toggle="tooltip" title="Edit"><i style="margin-right: 10px;" class="fas fa-user-edit"></i> </a>
                                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td >10</td>
                                    <td>Đặng Tiến 1</td>
                                    <td>23-10-2021</td>
                                    <td>0123456781</span></td>
                                    <td>dtk@gmail.com</td>
                                    <td >m</td>
                                    <td style=" color: #6d9886; font-size: 18px;">
                                        <a data-toggle="tooltip" title="Edit"><i style="margin-right: 10px;" class="fas fa-user-edit"></i> </a>
                                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td >10</td>
                                    <td>Đặng Tiến 1</td>
                                    <td>23-10-2021</td>
                                    <td>0123456781</span></td>
                                    <td>dtk@gmail.com</td>
                                    <td >m</td>
                                    <td style=" color: #6d9886; font-size: 18px;">
                                        <a data-toggle="tooltip" title="Edit"><i style="margin-right: 10px;" class="fas fa-user-edit"></i> </a>
                                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td >10</td>
                                    <td>Đặng Tiến 1</td>
                                    <td>23-10-2021</td>
                                    <td>0123456781</span></td>
                                    <td>dtk@gmail.com</td>
                                    <td >m</td>
                                    <td style=" color: #6d9886; font-size: 18px;">
                                        <a data-toggle="tooltip" title="Edit"><i style="margin-right: 10px;" class="fas fa-user-edit"></i> </a>
                                        <a data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
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