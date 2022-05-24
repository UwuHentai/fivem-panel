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

Route::get('/', function () {return view('welcome');});
Route::get('panel/home', function () {return view('panel/home');})->name('panel.home');

Auth::routes();

Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');

Route::get('vrp_users/ban', [App\Http\Controllers\vRPUsers::class, 'vRPUsers_ban'])->name('ban.user');
Route::get('vrp_users/unban', [App\Http\Controllers\vRPUsers::class, 'vRPUsers_unban'])->name('unban.user');
Route::get('vrp_users/whitelist', [App\Http\Controllers\vRPUsers::class, 'vRPUsers_whitelist'])->name('whitelist.user');
Route::get('vrp_users/unwhitelist', [App\Http\Controllers\vRPUsers::class, 'vRPUsers_unwhitelist'])->name('unwhitelist.user');
Route::get('vrp_users_money/addmoneywallet', [App\Http\Controllers\vRPUsersMoney::class, 'vRPUsersMoney_addwallet'])->name('addmoneywallet.user');
Route::get('vrp_users_money/removemoneywallet', [App\Http\Controllers\vRPUsersMoney::class, 'vRPUsersMoney_removewallet'])->name('removemoneywallet.user');
Route::get('vrp_users_money/addmoneybank', [App\Http\Controllers\vRPUsersMoney::class, 'vRPUsersMoney_addbank'])->name('addmoneybank.user');
Route::get('vrp_users_money/removemoneybank', [App\Http\Controllers\vRPUsersMoney::class, 'vRPUsersMoney_removebank'])->name('removemoneybank.user');
