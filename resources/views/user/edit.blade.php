@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 60px;" >
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="cursor-pointer rounded-md">
                        <i class="fas fa-angle-double-left text-2xl font-normal"></i>    
                    </button>
                    {{-- <div class="justify-center">Trang chủ</div> --}}
                    {{-- <div class="relative flex w-full flex-wrap items-stretch"> 
                        <span
                          class="z-10 h-full leading-snug font-normal absolutetext-center text-gray-400 absolute bg-transparent rounded items-center justify-center pl-3 py-3">
                          <i class="fas fa-search"></i>
                        </span>
                        <input type="search" id="search" name="search" class="form-input placeholder-gray-400 w-72 pl-10" placeholder="Tìm kiếm..."
                                style="font-family: 'Font Awesome 5 Free', 'system-ui'; border: 1px solid #4f4f4f" >
                    </div> --}}
                </div>
            </nav>

            <section class="row">
                <div class="col-12">
                    <form autocomplete="on"
                        action="{{route('kath.update', ['id' => Auth::user()->id])}}"
                        method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="card">
                            <div class="card-header text-center">
                                <b>Thông tin cá nhân</b>
                            </div>
                            <div class="card-body">
                                @if (session()->has('msgUpdateSuccess'))
                                    <div class="text-center text-blue-500">{{ session()->get('msgUpdateSuccess') }}</div>
                                @endif
                                <div class="text-center"></div>
                                <div class="form-group">
                                    <label for="username" class="font-semibold">Họ tên <span class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                                    @error('name')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group flex gap-4">
                                    <label for="gender" class="font-semibold">Giới tính</label><br>
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
                                    <label for="date" class="font-semibold">Ngày sinh</label>
                                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" @if (!empty($user->date_of_birth)) value="{{ $user->date_of_birth }}" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="telephone" class="font-semibold">Số điện thoại 
                                        <span class="text-red-600">* 
                                            @if (session()->has('msgPhone'))
                                                <span class="font-normal">{{ session()->get('msgPhone') }}</span>
                                            @endif
                                        </span>
                                    </label>
                                    <input type="tel" class="form-control" name="phone" id="phone" @if (!empty($user->phone)) value="{{ $user->phone}}" @endif>
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
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                                    @error('email')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="company" class="font-semibold">Công ty <span class="text-red-600">*</span></label>
                                    <input type="text" class="form-control" name="company" id="company" value="{{ $company }}" readonly>
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
