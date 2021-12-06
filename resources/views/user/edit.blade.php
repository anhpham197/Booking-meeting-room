@extends('layouts.app')
@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content">
            <nav class="navbar navbar-light bg-light flex justify-center" style="height: 70px;">
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="cursor-pointer rounded-md">
                        <i class="fas fa-angle-double-left text-2xl font-normal text-gray-400"></i>
                    </button>
                </div>
                <div class="text-black font-semibold flex gap-2 items-center py-2 px-3 rounded-md" style="background: #D9CAB3">
                    <i class="far fa-clock text-lg"></i>
                    <span id="ct"></span>
                </div>
            </nav>               

            <section class="row">
                <div class="col-12">
                    <form autocomplete="on" action="{{ route('kath.update', ['id' => Auth::user()->id]) }}" method="POST"
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
                                        value="{{ $company }}" readonly>
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: center;">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <script>
        $('#success-notification').fadeIn('100', function() {
                $('#success-notification').delay(3000).fadeOut()
            })
    </script>
@endsection
