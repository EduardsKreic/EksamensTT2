<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use App\Models\ClassSession;
use App\Models\Schedule;
use App\Models\Trainer;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return response()->json([
            'message' => 'Admin dashboard',
            'statistics' => [
                'users' => User::count(),
                'trainers' => Trainer::count(),
                'categories' => Category::count(),
                'schedules' => Schedule::count(),
                'classes' => ClassSession::count(),
                'bookings' => Booking::count(),
            ],
            'latest_users' => User::with('role')
                ->latest()
                ->take(5)
                ->get(),
            'latest_bookings' => Booking::with([
                'user',
                'classSession.trainer',
                'classSession.category',
                'classSession.schedule',
            ])
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }

    public function users()
    {
        return response()->json([
            'message' => 'User management',
            'users' => User::with('role')->get(),
        ]);
    }

    public function blockUser($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'is_blocked' => true,
        ]);

        return response()->json([
            'message' => 'User blocked successfully.',
            'user' => $user,
        ]);
    }

    public function unblockUser($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'is_blocked' => false,
        ]);

        return response()->json([
            'message' => 'User unblocked successfully.',
            'user' => $user,
        ]);
    }
}