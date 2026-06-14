<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ClassSession;
use App\Models\Schedule;
use App\Models\Trainer;
use Illuminate\Http\Request;

class ClassController extends Controller
{

public function index(Request $request)
{
    $query = ClassSession::with([
        'trainer',
        'category',
        'schedule',
    ]);

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    if ($request->filled('trainer_id')) {
        $query->where('trainer_id', $request->trainer_id);
    }

    if ($request->filled('date')) {
        $query->whereHas('schedule', function ($scheduleQuery) use ($request) {
            $scheduleQuery->where('class_date', $request->date);
        });
    }

        $classes = $query->get();
        $categories = Category::all();
        $trainers = Trainer::all();

        if ($request->ajax()) {
            return view('classes.partials.list', compact('classes'))->render();
}

return view('classes.index', compact('classes', 'categories', 'trainers'));
}

public function show($id)
{
    $class = ClassSession::with([
        'trainer',
        'category',
        'schedule',
        'bookings.user',
    ])->findOrFail($id);

    return view('classes.show', compact('class'));
}

    public function create()
    {
        return response()->json([
            'message' => 'Create class form data',
            'trainers' => Trainer::all(),
            'categories' => Category::all(),
            'schedules' => Schedule::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'trainer_id' => 'required|exists:trainers,id',
            'category_id' => 'required|exists:categories,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        $classSession = ClassSession::create($validated);

        return response()->json([
            'message' => 'Class created successfully.',
            'class' => $classSession,
        ], 201);
    }

    public function edit($id)
    {
        $classSession = ClassSession::with([
            'trainer',
            'category',
            'schedule',
        ])->findOrFail($id);

        return response()->json([
            'message' => 'Edit class form data',
            'class' => $classSession,
            'trainers' => Trainer::all(),
            'categories' => Category::all(),
            'schedules' => Schedule::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $classSession = ClassSession::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'trainer_id' => 'sometimes|required|exists:trainers,id',
            'category_id' => 'sometimes|required|exists:categories,id',
            'schedule_id' => 'sometimes|required|exists:schedules,id',
        ]);

        $classSession->update($validated);

        return response()->json([
            'message' => 'Class updated successfully.',
            'class' => $classSession,
        ]);
    }

    public function destroy($id)
    {
        $classSession = ClassSession::findOrFail($id);
        $classSession->delete();

        return response()->json([
            'message' => 'Class deleted successfully.',
        ]);
    }
}