<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TrainerPanelController;
use App\Models\ClassSession;
use App\Models\Trainer;
use App\Models\Booking;

Route::get('/locale/{locale}', function ($locale) {
    if (in_array($locale, ['lv', 'en'])) {
        session(['locale' => $locale]);
    }

    return redirect()->back();
})->name('locale.switch');

Route::get('/', function () {
    return view('home', [
        'classesCount' => ClassSession::count(),
        'trainersCount' => Trainer::count(),
        'bookingsCount' => Booking::count(),
    ]);
})->name('home');

Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
Route::get('/classes/{id}', [ClassController::class, 'show'])->name('classes.show');

Route::get('/trainers', [TrainerController::class, 'index'])->name('trainers.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'profile'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::patch('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    Route::post('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home');
    })->name('logout');
});

Route::middleware(['auth', 'role:trainer'])->group(function () {
    Route::get('/trainer', [TrainerPanelController::class, 'dashboard'])->name('trainer.dashboard');
    Route::get('/trainer/classes', [TrainerPanelController::class, 'classes'])->name('trainer.classes');
    Route::get('/trainer/classes/{id}', [TrainerPanelController::class, 'show'])->name('trainer.classes.show');
    Route::get('/trainer/classes/{id}/edit', [TrainerPanelController::class, 'edit'])->name('trainer.classes.edit');
    Route::put('/trainer/classes/{id}', [TrainerPanelController::class, 'update'])->name('trainer.classes.update');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);

    Route::get('/admin/users', [AdminController::class, 'users']);
    Route::patch('/admin/users/{id}/block', [AdminController::class, 'blockUser']);
    Route::patch('/admin/users/{id}/unblock', [AdminController::class, 'unblockUser']);

    Route::get('/admin/classes', [ClassController::class, 'adminIndex']);
    Route::get('/admin/classes/create', [ClassController::class, 'create']);
    Route::post('/admin/classes', [ClassController::class, 'store']);
    Route::get('/admin/classes/{id}/edit', [ClassController::class, 'edit']);
    Route::put('/admin/classes/{id}', [ClassController::class, 'update']);
    Route::patch('/admin/classes/{id}', [ClassController::class, 'update']);
    Route::delete('/admin/classes/{id}', [ClassController::class, 'destroy']);

    Route::get('/admin/trainers', [TrainerController::class, 'adminIndex']);
    Route::get('/admin/trainers/create', [TrainerController::class, 'create']);
    Route::post('/admin/trainers', [TrainerController::class, 'store']);
    Route::get('/admin/trainers/{id}/edit', [TrainerController::class, 'edit']);
    Route::put('/admin/trainers/{id}', [TrainerController::class, 'update']);
    Route::patch('/admin/trainers/{id}', [TrainerController::class, 'update']);
    Route::delete('/admin/trainers/{id}', [TrainerController::class, 'destroy']);

    Route::resource('/admin/schedules', ScheduleController::class);
});