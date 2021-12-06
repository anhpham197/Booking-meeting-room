<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\EventsController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'user'], function () {
    Route::get('/booking', [HomeController::class, 'show'])->name('show_booking');
    Route::get('/user/event', [HomeController::class, 'getEventByDay'])->name('user.events');

    Route::get('/create', [EventsController::class, 'create'])->name('create_booking');

    Route::get('/event/view', [EventsController::class, 'index'])->name('event.view');
    Route::get('/event/{id}/create', [EventsController::class, 'create'])->name('event.create');
    Route::get('/event/{id}/edit', [EventsController::class, 'edit'])->name('event.edit');
    Route::post('/event/store', [EventsController::class, 'store'])->name('event.store');
    Route::put('/event/{id}/update', [EventsController::class, 'update'])->name('event.update');
    Route::get('/event/rate', [EventsController::class, 'rate'])->name('event.rate');
    Route::get('/event/{id}/data', [EventsController::class, 'getEventData'])->name('event.data');
    Route::post('/event/rate/save', [EventsController::class, 'saveRate'])->name('event.saveRate');
    Route::delete('/event/{id}/delete', [EventsController::class, 'deleteEvent'])->name('event.delete');
    Route::get('/event/{file}/download', [EventsController::class, 'downloadFile'])->name('file.download');

    Route::get('/kath/create', [UserController::class, 'create'])->name('kath.create');
    Route::get('/kath/{id}/edit', [UserController::class, 'edit'])->name('kath.edit');
    Route::put('/kath/{id}/update', [UserController::class, 'update'])->name('kath.update');

    Route::resource('user', 'App\Http\Controllers\User\UserController');

    Route::get('/kath/create', [UserController::class, 'create'])->name('kath.create');
    Route::get('/kath/{id}/edit', [UserController::class, 'edit'])->name('kath.edit');
    Route::put('/kath/{id}/update', [UserController::class, 'update'])->name('kath.update');
    Route::get('/kath/{id}/delete', [UserController::class, 'delete'])->name('kath.delete');

    Route::put('/kath/{id}/change_password', [UserController::class, 'changePassword'])->name('kath.changePassword');
    Route::get('/kath/{id}/edit_password', [UserController::class, 'editPassword'])->name('kath.editPassword');

    Route::get('/kath/users', [UserController::class, 'showUsers'])->name('kath.showUsers');
    Route::get('kath/users/search', [UserController::class, 'searchUsers'])->name('kath.searchUsers');
    Route::get('kath/rooms', [EventsController::class, 'showRooms'])->name('kath.showRooms');
});


/* Route for admin */
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
});
