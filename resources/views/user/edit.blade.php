@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 80px;" >
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="footer-main-cl rounded-md">
                        <i class="fas fa-bars p-3"></i>
                    </button>
                    <form action="" method="post" class="flex" class="border border-gray-100">
                        <input type="search" id="search" name="search" class="pl-2 border border-gray-100 rounded-l" onchange="hideIcon(this);" placeholder=" Tìm kiếm"/>
                        <button type="submit" class="bg-blue-400 hover:bg-blue-500 p-3 w-1/5 rounded-r"><i class="fa fa-search"></i></button>                    
                    </form>
                </div>
            </nav>

            <section class="row">
                <div class="col-12">
                    <form autocomplete="on" action="{{route('kath.update', Auth::user()->id)}}" method="PATCH" enctype="multipart/form-data" @csrf>
                        <div class="card">
                            <div class="card-header text-center">
                                <b>Thông tin cá nhân</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Họ tên <span class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHid" value="{{ $user->name }}">
                                </div>
                                <div class="form-group flex gap-4">
                                    <label for="gender">Giới tính</label><br>
                                    <div>
                                        <input type="radio" name="gender" id="male" value="Nam" @if (!empty($user->gender) && $user->gender == 'Nam') 
                                            checked
                                        @endif> Nam
                                    </div>
                                    <div>
                                        <input type="radio" name="gender" id="female" value="Nữ" @if (!empty($user->gender) && $user->gender == 'Nữ')
                                            checked
                                        @endif> Nữ
                                    </div>
                                    <div>
                                        <input type="radio" name="gender" id="other" value="Khác" @if (!empty($user->gender) && $user->gender == 'Khác')
                                            checked
                                        @endif> Khác
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date">Ngày sinh</label>
                                    <input type="date" class="form-control" name="date" id="date" aria-describedby="dateHid" @if (!empty($user->date_of_birth)) value="{{ $user->date_of_birth }}" @endif>
                                </div>                           
                                <div class="form-group">
                                    <label for="telephone">Số điện thoại <span class="text-red-600">*</span></label>
                                    <input type="tel" class="form-control" name="telephone" id="telephone" aria-describedby="telephoneHid" @if (!empty($user->phone)) value="{{ $user->phone}}" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email <span class="text-red-600">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHid" value="{{ $user->email }}">
                                </div>  
                                <div class="form-group">
                                    <label for="company">Công ty <span class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="company" id="company" list="list_company">
                                    <?php
                                        $companies = \App\Models\Company::query()->get();
                                    ?>
                                    <datalist id="list_company">
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->name }}"></option>                                
                                        @endforeach                        
                                    </datalist>
                    
                                </div>
                            </div>            
                            <div class="card-footer" style="text-align: center;">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection