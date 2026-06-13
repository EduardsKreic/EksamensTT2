<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Bookings list'
        ]);
    }

    public function store()
    {
        return response()->json([
            'message' => 'Booking created'
        ]);
    }

    public function destroy($id)
    {
        return response()->json([
            'message' => 'Booking cancelled',
            'id' => $id
        ]);
    }
}