@extends('admin.layout')
@section('data-table')
    <div class="my-3"><a class="py-2 px-3 bg-blue-500 rounded-md text-white uppercase" href="{{ route('admin.users') }}">Back</a></div>
    <form autocomplete="on" action="" method="POST">
        <div class="card">
            <div class="card-header text-center uppercase text-xl font-semibold">ACCOUNT INFORMATION</div>
            <div class="card-body">
                @if (session()->has('msgUpdateSuccess'))
                    <div class="flex justify-center items-center text-green-700" id="success-notification"
                        style="display: none">
                        <div slot="avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="font-semibold max-w-full text-lg">{{ session()->get('msgUpdateSuccess') }}</div>
                    </div>
                @endif
                <div class="text-center"></div>
                <div class="form-group">
                    <label for="username" class="font-semibold">Full name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" readonly>
                </div>
                <div class="form-group flex gap-4">
                    <label for="gender" class="font-semibold">Gender</label><br>
                    <div>
                        <input type="radio" name="gender" id="male" disabled value="Nam" @if (!empty($user->gender) && $user->gender == 'Nam')
                        checked
                        @endif> Male
                    </div>
                    <div>
                        <input type="radio" name="gender" id="female" disabled value="Nữ" @if (!empty($user->gender) && $user->gender == 'Nữ')
                        checked
                        @endif> Female
                    </div>
                    <div>
                        <input type="radio" name="gender" id="other" disabled value="Khác" @if (!empty($user->gender) && $user->gender == 'Khác')
                        checked
                        @endif> Other
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="font-semibold">Date of birth</label>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                        @if (!empty($user->date_of_birth)) value="{{ $user->date_of_birth }}" @endif readonly>
                </div>
                <div class="form-group">
                    <label for="telephone" class="font-semibold">Phone
                    </label>
                    <input type="tel" class="form-control" name="phone" id="phone" @if (!empty($user->phone)) value="{{ $user->phone }}" @endif readonly>
                </div>
                <div class="form-group">
                    <label for="email" class="font-semibold">Email
                    </label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="company" class="font-semibold">Company</label>

                    <input type="text" class="form-control" name="company" id="company" @if (!$user->isAdmin) value="{{ $user->company->name }}" @endif readonly>
                </div>
            </div>
        </div>
    </form>
@endsection
