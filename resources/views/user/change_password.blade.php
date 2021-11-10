@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Thay đổi mật khẩu
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8"
                    method="POST" 
                    action="{{ route('kath.changePassword', ['id' => Auth::user()->id]) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="new_password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Mật khẩu mới:
                        </label>

                        <input id="new_password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="new_password"
                            required>

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="repeat_password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Xác nhận mật khẩu mới:
                        </label>

                        <input id="repeat_password" type="password"
                            class="form-input w-full @error('repeat_password') border-red-500 @enderror" name="repeat_password"
                            required>

                        @error('repeat_password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="text-center pb-5">
                        <button type="submit" class="py-3 px-3 bg-blue-500 hover:bg-blue-600 rounded-xl shadow-sm text-base text-white uppercase">Cập nhật</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
@endsection
