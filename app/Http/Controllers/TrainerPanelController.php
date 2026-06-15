<?php

namespace App\Http\Controllers;

use App\Models\ClassSession;
use Illuminate\Http\Request;

class TrainerPanelController extends Controller
{
    public function dashboard()
    {
        $trainer = auth()->user()->trainer;

        if (! $trainer) {
            return redirect()->route('profile')->with('error', 'Trainer profile is not connected to this user.');
        }

        $classesCount = $trainer->classSessions()->count();

        return view('trainer.dashboard', compact('trainer', 'classesCount'));
    }

    public function classes()
    {
        $trainer = auth()->user()->trainer;

        if (! $trainer) {
            return redirect()->route('profile')->with('error', 'Trainer profile is not connected to this user.');
        }

        $classes = $trainer->classSessions()
            ->with(['category', 'schedule', 'bookings.user'])
            ->get();

        return view('trainer.classes', compact('trainer', 'classes'));
    }

    public function show($id)
    {
        $trainer = auth()->user()->trainer;

        if (! $trainer) {
            return redirect()->route('profile')->with('error', 'Trainer profile is not connected to this user.');
        }

        $class = ClassSession::with(['category', 'schedule', 'bookings.user'])
            ->where('trainer_id', $trainer->id)
            ->findOrFail($id);

        return view('trainer.show', compact('trainer', 'class'));
    }

    public function edit($id)
    {
        $trainer = auth()->user()->trainer;

        if (! $trainer) {
            return redirect()->route('profile')->with('error', 'Trainer profile is not connected to this user.');
        }

        $class = ClassSession::where('trainer_id', $trainer->id)
            ->findOrFail($id);

        return view('trainer.edit', compact('trainer', 'class'));
    }

    public function update(Request $request, $id)
    {
        $trainer = auth()->user()->trainer;

        if (! $trainer) {
            return redirect()->route('profile')->with('error', 'Trainer profile is not connected to this user.');
        }

        $class = ClassSession::where('trainer_id', $trainer->id)
            ->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $class->update($validated);

        return redirect()->route('trainer.classes')->with('success', 'Class updated successfully.');
    }
}