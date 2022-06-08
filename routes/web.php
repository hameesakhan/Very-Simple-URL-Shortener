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

Route::view('/', 'user-urls/index')->name('home');
Route::post('/', [App\Http\Controllers\UserURLController::class, 'store']);
Route::get('/{user_url:shortend_hash}', [App\Http\Controllers\UserURLController::class, 'show'])->name('user-url.show');