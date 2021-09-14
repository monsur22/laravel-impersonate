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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get ( 'impersonate/{user_id}', [App\Http\Controllers\HomeController::class, 'impersonate'])->name('impersonate') ;
    Route::get ( 'impersonate_leave', [App\Http\Controllers\HomeController::class, 'impersonate_leave'])->name('impersonate_leave') ;
});
