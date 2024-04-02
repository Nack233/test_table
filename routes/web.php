<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomBookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RoomBookingController::class, 'index'])->name('home');
Route::post('/bookings/{booking}/approve', 'RoomBookingController@approve');
Route::post('/bookings/{booking}/cancel', 'RoomBookingController@cancel');
Route::get('/bookings/{booking}', 'RoomBookingController@show');
