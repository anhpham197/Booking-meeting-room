<?php

use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('/kath', UserController::class);
Route::get('/kath/create', [UserController::class, 'create'])->name('kath.create');
Route::get('/kath/{id}/edit', [UserController::class, 'edit'])->name('kath.edit');
Route::put('/kath/{id}/update', [UserController::class, 'update'])->name('kath.update');

Route::post('change_password', [UserController::class, 'changePassword']);
Route::get('password', function() {
    return view('user.change_password');
})->name('password');
