<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/create', [\App\Http\Controllers\EventsController::class, 'create'])->name('create_booking');

Route::get('event/create', [EventsController::class, 'create'])->name('event.create');
Route::get('event/{id}/edit', [EventsController::class, 'edit'])->name('event.edit');
Route::get('event/rate', [EventsController::class, 'rate'])->name('event.rate');


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('/kath', UserController::class);
Route::get('/kath/create', [UserController::class, 'create'])->name('kath.create');
Route::get('/kath/{id}/edit', [UserController::class, 'edit'])->name('kath.edit');
Route::put('/kath/{id}/update', [UserController::class, 'update'])->name('kath.update');

Route::put('/kath/{id}/change_password', [UserController::class, 'changePassword'])->name('kath.changePassword');
Route::get('/kath/{id}/edit_password', [UserController::class, 'editPassword'])->name('kath.editPassword');

Route::get('/kath/users', [UserController::class, 'showUsers'])->name('kath.showUsers');
Route::get('/kath/rooms', [EventsController::class, 'showRooms'])->name('kath.showRooms');
