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

    public function adminIndex()
    {
        $classes = ClassSession::with([
            'trainer',
            'category',
            'schedule',
        ])->get();

        return view('admin.classes.index', compact('classes'));
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
        $trainers = Trainer::all();
        $categories = Category::all();
        $schedules = Schedule::all();

        return view('admin.classes.create', compact(
            'trainers',
            'categories',
            'schedules'
        ));
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

        ClassSession::create($validated);

        return redirect('/admin/classes')
            ->with('success', 'Class created successfully.');
    }

    public function edit($id)
    {
        $class = ClassSession::findOrFail($id);
        $trainers = Trainer::all();
        $categories = Category::all();
        $schedules = Schedule::all();

        return view('admin.classes.edit', compact(
            'class',
            'trainers',
            'categories',
            'schedules'
        ));
    }

    public function update(Request $request, $id)
    {
        $class = ClassSession::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'trainer_id' => 'required|exists:trainers,id',
            'category_id' => 'required|exists:categories,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        $class->update($validated);

        return redirect('/admin/classes')
            ->with('success', 'Class updated successfully.');
    }

    public function destroy($id)
    {
        $class = ClassSession::findOrFail($id);
        $class->delete();

        return redirect('/admin/classes')
            ->with('success', 'Class deleted successfully.');
    }
}