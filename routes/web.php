<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/', [ContentController::class, 'getHome']);

//Router de autentificacion
Route::get('login', [ConnectController::class, 'getLogin']);

Route::post('login', [ConnectController::class, 'postLogin']);

Route::get('logout', [ConnectController::class, 'getLogout']);

Route::get('register', [ConnectController::class, 'getRegister']);

Route::post('register', [ConnectController::class, 'postRegister']);


//Admin Routes.
Route::prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class, 'getDashboard']);
});