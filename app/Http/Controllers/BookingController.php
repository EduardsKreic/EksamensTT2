<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ClassSession;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::with([
            'user',
            'classSession.trainer',
            'classSession.category',
            'classSession.schedule',
        ])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'class_session_id' => 'required|exists:class_sessions,id',
        ]);

        $classSession = ClassSession::with('schedule')
            ->findOrFail($request->class_session_id);

        $existingBooking = Booking::where('user_id', $request->user_id)
            ->where('class_session_id', $request->class_session_id)
            ->where('status', 'active')
            ->first();

        if ($existingBooking) {
            return response()->json([
                'message' => 'User already has an active booking for this class.',
            ], 400);
        }

        if ($classSession->schedule->available_places <= 0) {
            return response()->json([
                'message' => 'No available places for this class.',
            ], 400);
        }

        $booking = Booking::create([
            'user_id' => $request->user_id,
            'class_session_id' => $request->class_session_id,
            'status' => 'active',
        ]);

        $classSession->schedule->decrement('available_places');

        return response()->json([
            'message' => 'Booking created successfully.',
            'booking' => $booking,
        ], 201);
    }

    public function destroy($id)
    {
        $booking = Booking::with('classSession.schedule')->findOrFail($id);

        if ($booking->status === 'cancelled') {
            return response()->json([
                'message' => 'Booking is already cancelled.',
            ], 400);
        }

        $booking->update([
            'status' => 'cancelled',
        ]);

        $booking->classSession->schedule->increment('available_places');

        return response()->json([
            'message' => 'Booking cancelled successfully.',
        ]);
    }
}