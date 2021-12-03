<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\EventsController;
use App\Http\Controllers\User\RoomsController;
use App\Http\Controllers\User\HomeController;
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

Route::get('/booking', [HomeController::class, 'show'])->name('show_booking');

Route::get('/create', [EventsController::class, 'create'])->name('create_booking');

Route::resource('events', 'App\Http\Controllers\EventsController');
Route::get('/event/view', [EventsController::class, 'index'])->name('event.view');
Route::get('/event/{id}/create', [EventsController::class, 'create'])->name('event.create');
Route::get('/event/{id}/edit', [EventsController::class, 'edit'])->name('event.edit');
Route::post('/event/store', [EventsController::class, 'store'])->name('event.store');
Route::put('/event/{id}/update', [EventsController::class, 'update'])->name('event.update');
Route::get('/event/{id}/delete', [EventsController::class, 'deleteEvent'])->name('event.delete');

Route::get('event/rate', [EventsController::class, 'rate'])->name('event.rate');

// Rooms
Route::get('/room/view', [RoomsController::class, 'index'])->name('room.view');
Route::get('/room/create', [RoomsController::class, 'create'])->name('room.create');
Route::get('/room/{id}/edit', [RoomsController::class, 'edit'])->name('room.edit');
Route::put('/room/upload', [RoomsController::class, 'upload'])->name('room.upload');
Route::put('/room/{id}/update', [RoomsController::class, 'update'])->name('room.update');
/* Route::delete('rooms/destroy', 'RoomsController@massDestroy')->name('rooms.massDestroy'); */
Route::resource('rooms', 'RoomsController');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kath/create', [UserController::class, 'create'])->name('kath.create');
Route::get('/kath/{id}/edit', [UserController::class, 'edit'])->name('kath.edit');
Route::put('/kath/{id}/update', [UserController::class, 'update'])->name('kath.update');

Route::put('/kath/{id}/change_password', [UserController::class, 'changePassword'])->name('kath.changePassword');
Route::get('/kath/{id}/edit_password', [UserController::class, 'editPassword'])->name('kath.editPassword');

Route::get('/kath/users', [UserController::class, 'showUsers'])->name('kath.showUsers');
Route::get('kath/rooms', [EventsController::class, 'showRooms'])->name('kath.showRooms');

Route::get('test', [AdminController::class, 'test']);
