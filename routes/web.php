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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout'])->middleware('auth');

Route::view('rate', 'rateForm')->middleware('auth');

Route::post('rate', [App\Http\Controllers\SetRateController::class, 'store'])->middleware('auth');

Route::get('create-user',[App\Http\Controllers\UserController::class, 'create'])->middleware('auth');

Route::post('create-user', [App\Http\Controllers\UserController::class, 'store'])->middleware('auth');

