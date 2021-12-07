<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\EventsController;
use App\Http\Controllers\User\HomeController;
use App\Exports\ExportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
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

    Route::get('/event/export', [EventsController::class, 'exportEvents'])->name('event.export');
    Route::get('/kath/export', [UserController::class, 'exportUsers'])->name('kath.export');
});


/* Route for admin */
Route::group(['middleware' => 'admin'], function () {
    // Route::resource('admin', 'App\Http\Controllers\Admin\AdminController');

    Route::get('/admin/user', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/user/{id}/show', [AdminController::class, 'userDetails'])->name('users.details');
    Route::get('/admin/user/{id}/delete', [AdminController::class, 'deleteUser'])->name('users.delete');

    Route::get('/admin/event', [AdminController::class, 'events'])->name('admin.events');
    Route::get('/admin/event/{id}/show', [AdminController::class, 'eventDetails'])->name('events.details');
    Route::get('/admin/event/{id}/delete', [AdminController::class, 'deleteEvent'])->name('events.delete');

    Route::get('/admin/room', [AdminController::class, 'rooms'])->name('admin.rooms');
    Route::get('/admin/room/create', [AdminController::class, 'createRoom'])->name('rooms.create');
    Route::put('/admin/room/upload', [AdminController::class, 'storeRoom'])->name('rooms.upload');
    Route::get('/admin/room/{id}/show', [AdminController::class, 'roomDetails'])->name('rooms.details');
    Route::get('/admin/room/{id}/edit', [AdminController::class, 'roomEdit'])->name('rooms.edit');
    Route::get('/admin/room/{id}/delete', [AdminController::class, 'deleteRoom'])->name('rooms.delete');

    Route::get('/admin/facility', [AdminController::class, 'facilities'])->name('admin.facilities');
    Route::get('/admin/facility/create', [AdminController::class, 'createFacility'])->name('facilities.create');
    Route::put('/admin/facility/upload', [AdminController::class, 'storeFacility'])->name('facilities.upload');
    Route::get('/admin/facility/{id}/show', [AdminController::class, 'facilityDetails'])->name('facilities.details');
    Route::get('/admin/facility/{id}/edit', [AdminController::class, 'facilityEdit'])->name('facilities.edit');
    Route::get('/admin/facility/{id}/delete', [AdminController::class, 'deleteFacility'])->name('facilities.delete');

    Route::get('/admin/company', [AdminController::class, 'companies'])->name('admin.companies');

    Route::get('admin/event/export', [MyController::class, 'exportEvents'])->name('exportEvents');
    Route::get('admin/user/export', [MyController::class, 'exportUsers'])->name('exportUsers');
    Route::get('admin/room/export', [MyController::class, 'exportRooms'])->name('exportRooms');
    Route::get('admin/company/export', [MyController::class, 'exportCompanies'])->name('exportCompanies');
    Route::get('admin/facility/export', [MyController::class, 'exportFacilities'])->name('exportFacilities');
    Route::get('importExportView', [MyControlle::class, 'importExportView']);
});
