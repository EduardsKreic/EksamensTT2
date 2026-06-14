<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/classes', [ClassController::class, 'index']);
Route::get('/classes/{id}', [ClassController::class, 'show']);
Route::get('/trainers', [TrainerController::class, 'index']);
Route::get('/trainers/{id}', [TrainerController::class, 'show']);
Route::get('/trainers/{id}/classes', [TrainerController::class, 'classes']);
Route::get('/classes/{id}/participants', [TrainerController::class, 'participants']);




Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile']);
    Route::patch('/profile', [UserController::class, 'updateProfile']);

    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/bookings', [BookingController::class, 'store']);
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/users', [AdminController::class, 'users']);
    Route::patch('/admin/users/{id}/block', [AdminController::class, 'blockUser']);
    Route::patch('/admin/users/{id}/unblock', [AdminController::class, 'unblockUser']);
    Route::resource('schedules', ScheduleController::class);
    Route::get('/admin/classes/create', [ClassController::class, 'create']);
    Route::post('/admin/classes', [ClassController::class, 'store']);
    Route::get('/admin/classes/{id}/edit', [ClassController::class, 'edit']);
    Route::put('/admin/classes/{id}', [ClassController::class, 'update']);
    Route::patch('/admin/classes/{id}', [ClassController::class, 'update']);
    Route::delete('/admin/classes/{id}', [ClassController::class, 'destroy']);
});