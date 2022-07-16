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
    return view('home');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// FiveM-Server actions
Route::get('/dashboard/vrp-users/ban', [App\Http\Controllers\vRPUsers::class, 'ban'])->name('fivem-ban'); 
Route::get('/dashboard/vrp-users/unban', [App\Http\Controllers\vRPUsers::class, 'unban'])->name('fivem-unban');
Route::get('/dashboard/vrp-users/whitelist', [App\Http\Controllers\vRPUsers::class, 'whitelist'])->name('fivem-whitelist');
Route::get('/dashboard/vrp-users/unwhitelist', [App\Http\Controllers\vRPUsers::class, 'unwhitelist'])->name('fivem-unwhitelist');