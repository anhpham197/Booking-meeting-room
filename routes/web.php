<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/booking', [\App\Http\Controllers\HomeController::class, 'show'])->name('show_booking');
/* Route::get('/booking', function () {
    return view('booking/main');
})->name('booking'); */
Auth::routes();

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

<<<<<<< HEAD

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
Route::get('/edit_profile', function () {
    return view('user.edit');
})->name('edit_profile');

Route::get('/change_password', function () {
    return view('user.change_password');
})->name('change_password');
>>>>>>> 5c0ef833c88425cbf8f1a5db7bf9d0810c81b05a
