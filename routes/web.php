<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/classes', [ClassController::class, 'index']);
Route::get('/classes/{id}', [ClassController::class, 'show']);

Route::get('/trainers', [TrainerController::class, 'index']);

Route::get('/bookings', [BookingController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);
Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);

Route::get('/profile', [UserController::class, 'profile']);

Route::get('/admin', [AdminController::class, 'dashboard']);

Route::resource('schedules', ScheduleController::class);