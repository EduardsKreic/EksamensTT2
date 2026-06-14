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
        $statistics = [
            'users' => User::count(),
            'trainers' => Trainer::count(),
            'categories' => Category::count(),
            'schedules' => Schedule::count(),
            'classes' => ClassSession::count(),
            'bookings' => Booking::count(),
        ];

        $latestUsers = User::with('role')
            ->latest()
            ->take(5)
            ->get();

        $latestBookings = Booking::with([
            'user',
            'classSession.trainer',
            'classSession.category',
            'classSession.schedule',
        ])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'statistics',
            'latestUsers',
            'latestBookings'
        ));
    }

    public function users()
    {
        $users = User::with('role')->get();

        return view('admin.users', compact('users'));
    }

    public function blockUser($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'is_blocked' => true,
        ]);

        return redirect('/admin/users')
            ->with('success', 'User blocked successfully.');
    }

    public function unblockUser($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'is_blocked' => false,
        ]);

        return redirect('/admin/users')
            ->with('success', 'User unblocked successfully.');
    }
}