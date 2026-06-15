<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();

        return view('trainers.index', compact('trainers'));
    }

    public function adminIndex()
    {
        $trainers = Trainer::all();

        return view('admin.trainers.index', compact('trainers'));
    }

    public function create()
    {
        return view('admin.trainers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Trainer::create($validated);

        return redirect('/admin/trainers')
            ->with('success', 'Trainer created successfully.');
    }

    public function edit($id)
    {
        $trainer = Trainer::findOrFail($id);

        return view('admin.trainers.edit', compact('trainer'));
    }

    public function update(Request $request, $id)
    {
        $trainer = Trainer::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $trainer->update($validated);

        return redirect('/admin/trainers')
            ->with('success', 'Trainer updated successfully.');
    }

    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();

        return redirect('/admin/trainers')
            ->with('success', 'Trainer deleted successfully.');
    }
}