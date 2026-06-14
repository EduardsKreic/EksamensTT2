<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ClassSession;
use Illuminate\Http\Request;

class BookingController extends Controller
{
   public function index()
{
    $bookings = Booking::with([
        'user',
        'classSession.trainer',
        'classSession.category',
        'classSession.schedule',
    ])
    ->where('user_id', auth()->id())
    ->latest()
    ->get();

    return view('bookings.index', compact('bookings'));
}

   public function store(Request $request)
{
    $request->validate([
        'class_session_id' => 'required|exists:class_sessions,id',
    ]);

    $classSession = ClassSession::with('schedule')
        ->findOrFail($request->class_session_id);

   $existingBooking = Booking::where('user_id', auth()->id())
    ->where('class_session_id', $request->class_session_id)
    ->first();

if ($existingBooking && $existingBooking->status === 'active') {
    return redirect()->back()->with('error', 'You already booked this class.');
}

if ($existingBooking && $existingBooking->status === 'cancelled') {
    if (!$classSession->schedule || $classSession->schedule->available_places <= 0) {
        return redirect()->back()->with('error', 'No available places.');
    }

    $existingBooking->update([
        'status' => 'active',
    ]);

    $classSession->schedule->decrement('available_places');

    return redirect()->route('bookings.index')
        ->with('success', 'Booking created successfully.');
}

    if (!$classSession->schedule || $classSession->schedule->available_places <= 0) {
        return redirect()->back()->with('error', 'No available places.');
    }

    Booking::create([
        'user_id' => auth()->id(),
        'class_session_id' => $request->class_session_id,
        'status' => 'active',
    ]);

    $classSession->schedule->decrement('available_places');

    return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
}

    public function destroy($id)
    {
        $booking = Booking::with('classSession.schedule')->findOrFail($id);

        if ($booking->status === 'cancelled') {
        return redirect()->route('bookings.index')
    ->with('error', 'Booking is already cancelled.');
        }

        $booking->update([
            'status' => 'cancelled',
        ]);

        $booking->classSession->schedule->increment('available_places');

       return redirect()->route('bookings.index')
    ->with('success', 'Booking cancelled successfully.');
    }
}