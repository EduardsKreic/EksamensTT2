<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return response()->json([
            'schedules' => Schedule::all(),
        ]);
    }

    public function create()
    {
        return response()->json([
            'message' => 'Create schedule form data',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'place' => 'required|string|max:255',
            'available_places' => 'required|integer|min:1',
        ]);

        $schedule = Schedule::create($validated);

        return response()->json([
            'message' => 'Schedule created successfully.',
            'schedule' => $schedule,
        ], 201);
    }

    public function show(Schedule $schedule)
    {
        return response()->json([
            'schedule' => $schedule,
        ]);
    }

    public function edit(Schedule $schedule)
    {
        return response()->json([
            'schedule' => $schedule,
        ]);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'class_date' => 'sometimes|date',
            'start_time' => 'sometimes',
            'end_time' => 'sometimes',
            'place' => 'sometimes|string|max:255',
            'available_places' => 'sometimes|integer|min:1',
        ]);

        $schedule->update($validated);

        return response()->json([
            'message' => 'Schedule updated successfully.',
            'schedule' => $schedule,
        ]);
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return response()->json([
            'message' => 'Schedule deleted successfully.',
        ]);
    }
}