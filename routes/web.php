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

Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('vrp_users/ban', [App\Http\Controllers\vRPUsers::class, 'vRPUsers_ban'])->name('ban.user');
Route::get('vrp_users/unban', [App\Http\Controllers\vRPUsers::class, 'vRPUsers_unban'])->name('unban.user');
Route::get('vrp_users/whitelist', [App\Http\Controllers\vRPUsers::class, 'vRPUsers_whitelist'])->name('whitelist.user');
Route::get('vrp_users/unwhitelist', [App\Http\Controllers\vRPUsers::class, 'vRPUsers_unwhitelist'])->name('unwhitelist.user');
