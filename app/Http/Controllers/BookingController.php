<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ClassSession;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'class_session_id' => 'required'
        ]);

        $exists = Booking::where('user_id', $request->user_id)
            ->where('class_session_id', $request->class_session_id)
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'Already booked'
            ], 400);
        }

        $booking = Booking::create([
            'user_id' => $request->user_id,
            'class_session_id' => $request->class_session_id,
            'status' => 'active'
        ]);

        return response()->json($booking);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'cancelled'
        ]);

        return response()->json([
            'message' => 'Booking cancelled'
        ]);
    }
}