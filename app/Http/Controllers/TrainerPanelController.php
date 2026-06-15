<?php

namespace App\Http\Controllers;

use App\Models\ClassSession;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerPanelController extends Controller
{
    private function currentTrainer()
    {
        return Trainer::where('user_id', auth()->id())->firstOrFail();
    }

    public function dashboard()
    {
        $trainer = $this->currentTrainer();

        $classesCount = $trainer->classSessions()->count();

        return view('trainer.dashboard', compact('trainer', 'classesCount'));
    }

    public function classes()
    {
        $trainer = $this->currentTrainer();

        $classes = $trainer->classSessions()
            ->with(['category', 'schedule', 'bookings.user'])
            ->get();

        return view('trainer.classes', compact('trainer', 'classes'));
    }

    public function show($id)
    {
        $trainer = $this->currentTrainer();

        $class = ClassSession::with(['category', 'schedule', 'bookings.user'])
            ->where('trainer_id', $trainer->id)
            ->findOrFail($id);

        return view('trainer.show', compact('trainer', 'class'));
    }

    public function edit($id)
    {
        $trainer = $this->currentTrainer();

        $class = ClassSession::where('trainer_id', $trainer->id)
            ->findOrFail($id);

        return view('trainer.edit', compact('trainer', 'class'));
    }

    public function update(Request $request, $id)
    {
        $trainer = $this->currentTrainer();

        $class = ClassSession::where('trainer_id', $trainer->id)
            ->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $class->update($validated);

        return redirect('/trainer/classes')->with('success', 'Class updated successfully.');
    }
}