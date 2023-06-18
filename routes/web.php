<?php

use App\Http\Controllers\Permission\RoleController;
use App\Http\Controllers\Permission\UserController;
use App\Http\Controllers\Permission\UserRoleController;
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
    Route::resource('permission/user', UserController::class);
    Route::resource('permission/user.role', UserRoleController::class);
    Route::resource('permission/role', RoleController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
