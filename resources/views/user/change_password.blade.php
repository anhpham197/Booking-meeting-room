@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full pb-5">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md uppercase text-center text-xl">
                    Change your password
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8"
                    method="POST" 
                    action="{{ route('kath.changePassword', ['id' => Auth::user()->id]) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="newPassword" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            New password:
                        </label>

                        <input id="newPassword" type="password"
                            class="form-input w-full @error('newPassword') border-red-500 @enderror" name="newPassword" placeholder="********"
                            required>

                        @error('newPassword')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="newPassword_confirmation" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Confirm new password:
                        </label>

                        <input id="newPassword_confirmation" type="password"
                            class="form-input w-full @error('newPassword_confirmation') border-red-500 @enderror" name="newPassword_confirmation" placeholder="********"
                            required>

                        @error('newPassword_confirmation')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="text-center pb-5">
                        <button type="submit" class="py-3 px-3 bg-blue-500 hover:bg-blue-600 rounded-xl shadow-sm text-base text-white uppercase">Submit</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
@endsection
