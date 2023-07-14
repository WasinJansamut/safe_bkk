<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;

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
    // return view('auth/login');
    return redirect()->route('risk_point');
});
Route::get('/risk_point', [HomeController::class, 'risk_point'])->name('risk_point');
Route::get('/risk_point/{search}', [HomeController::class, 'risk_point_search'])->name('risk_point.search');
Route::get('/working_group', [HomeController::class, 'working_group'])->name('working_group');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
});
