<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::orderBy('class_date', 'asc')
            ->orderBy('start_time', 'asc')
            ->get();

        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'place' => 'required|string|max:255',
            'available_places' => 'required|integer|min:1',
        ]);

        Schedule::create($validated);

        return redirect('/admin/schedules')->with('success', 'Schedule created successfully.');
    }

    public function show(Schedule $schedule)
    {
        return redirect('/admin/schedules');
    }

    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'class_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'place' => 'required|string|max:255',
            'available_places' => 'required|integer|min:1',
        ]);

        $schedule->update($validated);

        return redirect('/admin/schedules')->with('success', 'Schedule updated successfully.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect('/admin/schedules')->with('success', 'Schedule deleted successfully.');
    }
}