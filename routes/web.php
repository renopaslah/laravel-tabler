<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserEnableDisabledController;
use App\Http\Controllers\Admin\UserPasswordResetController;
use App\Http\Controllers\Admin\UserRoleController;
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
    return view('page');
})->middleware('auth');

Route::get('/page', function () {
    return view('page');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('admin/user', UserController::class)->names('admin.user');
    Route::get('admin/user/{user}/reset-password', [UserPasswordResetController::class, '__invoke'])->name('admin.user.reset-password');
    Route::get('admin/user/{user}/set-status', [UserEnableDisabledController::class, '__invoke'])->name('admin.user.set-status');
    Route::resource('admin/user.role', UserRoleController::class)->names('admin.user.role');
    Route::resource('admin/role', RoleController::class)->names('admin.role');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
