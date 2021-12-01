<!DOCTYPE html>
<html>
<head>
	<title>Booking</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">


</head>

<body>



    <div class="wrapper" >
        <nav id="sidebar">
             <div class="sidebar-header">
                 <h3>Booking</h3>
             </div>
             <ul class="lisst-unstyled components">

                 <li>
                    <i class="fas fa-home"></i>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Thông tin cá nhân</a>

                    <ul class="collapse list-unstyled subnav" id="homeSubmenu" >
                       <li>
                           <a href="#">Home 1</a>
                       </li>
                       <li>
                           <a href="#">Home 2</a>
                       </li>

                   </ul>
                 </li>
                 <li>
                    <i class="fas fa-chevron-circle-down"></i>
                    <a href="#">About</a>
                 </li>
                 <li>
                     <i class="far fa-file-alt"></i>
                     <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                     <ul class="collapse list-unstyled subnav" id="pageSubmenu" >
                         <li >
                             <a href="#">Page 1</a>
                         </li>
                         <li>
                             <a href="#">Page 2</a>
                         </li>
                     </ul>
                 </li>
               <li>
                    <i class="fas fa-paint-brush"></i>
                    <a href="#">Policy</a>
               </li>
               <li>
                    <i class="fas fa-mail-bulk"></i>
                    <a href="#">Contact </a>
               </li>

             </ul>
        </nav>
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light " style="height: 81px;" >
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="footer-main-cl">
                    <i class="fas fa-bars"></i>

                    </button>
                </div>
            </nav>
            <div style="height: 888px;" >
                <table class="table table-bordered table-hover" style="text-align: center;">
                    <thead class=" bg-success text-white">
                      <tr>
                        <th scope="col">Mã phòng</th>
                        <th scope="col">Tầng</th>
                        <th scope="col">Diện tích (m2)</th>
                        <th scope="col">Số ghế</th>
                        <th scope="col">Trang thiết bị</th>
                        <th scope="col">Trạng thái</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">
                            <select>
                                <option selected>Chọn mã phòng</option>
                                <option value="401">401</option>
                                <option value="402">402</option>
                                <option value="403">403</option>
                                <option value="404">404</option>
                            </select>
                        </th>
                        <td>
                            <select>
                                <option selected>Chọn tầng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </td>
                        <td>Diện tích</td>
                        <td>Số ghế</td>
                        <td>Trang thiết bị</td>
                        <td>Trạng thái</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <footer class="page-footer bg-dark pt-3 pb-5">

        <div class="container text-center text-md-left mt-5">
            <div class="row">
                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold"> product</h6>
                    <hr class="footer-main-cl mb-4 mt-0 d-inline-block max-auto" style="width: 125px; height: 10px;border-radius: 10px;">
                    <p class="mt-2">
                        Sản phẩm giúp đặt phòng nhanh chóng, đảm bản uy tín chất lượng
                    </p>
                </div>
                <div class="col-md-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">ingredient</h6>
                    <hr class="footer-main-cl mb-4 mt-0 d-inline-block max-auto" style="width: 125px; height: 10px;border-radius: 10px;">
                    <ul class="list-unstyled">
                        <li class="my-2"><a href="#">HTML 5</a></li>
                        <li class="my-2"><a href="#">CSS 3</a></li>
                        <li class="my-2"><a href="#">Bootstrap 4</a></li>
                        <li class="my-2"><a href="#">JavaScript</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">contact</h6>
                    <hr class="footer-main-cl mb-4 mt-0 d-inline-block max-auto" style="width: 125px; height: 10px;border-radius: 10px;">
                    <ul class="list-unstyled">
                        <li class="my-2"><i class="fas fa-phone mr-2"></i> 113</li>
                        <li class="my-2"><i class="fab fa-github mr-2"></i>penzz</li>
                        <li class="my-2"><i class="fas fa-envelope-square mr-2"></i>gmail</li>
                        <li class="my-2"><i class="fas fa-home mr-2"></i>144 Xuan Thuy</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="">
            <div class="footer-main-cl ">

                <div class="footer-copyright text-center py-4">
                    <p>
                        <a href="">Copyright 1999-2021</a>  by Penzz DKhanh. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>



    </footer>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
</body>
</html>
