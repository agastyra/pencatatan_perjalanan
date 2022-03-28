<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPerjalananController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardPerjalananController::class, 'index'])->middleware('auth');
Route::get('/dashboard/print', [DashboardPerjalananController::class, 'print'])->middleware('auth');

Route::get('/dashboard/create', [DashboardPerjalananController::class, 'create'])->middleware('user');
Route::post('/dashboard', [DashboardPerjalananController::class, 'store'])->middleware('user');

Route::get('/dashboard/admins', [UserController::class, 'admin'])->middleware('superadmin');
Route::get('/dashboard/users', [UserController::class, 'index'])->middleware('administrator');
