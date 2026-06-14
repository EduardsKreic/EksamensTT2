<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ClassSession;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Trainer list',
            'trainers' => Trainer::all(),
        ]);
    }

    public function show($id)
    {
        $trainer = Trainer::with([
            'classSessions.category',
            'classSessions.schedule',
        ])->findOrFail($id);

        return response()->json([
            'message' => 'Trainer details',
            'trainer' => $trainer,
        ]);
    }

    public function classes($trainerId)
    {
        $classes = ClassSession::with([
            'category',
            'schedule',
        ])
        ->where('trainer_id', $trainerId)
        ->get();

        return response()->json([
            'message' => 'Trainer classes',
            'classes' => $classes,
        ]);
    }

    public function participants($classId)
    {
        $participants = Booking::with('user')
            ->where('class_session_id', $classId)
            ->where('status', 'active')
            ->get();

        return response()->json([
            'message' => 'Class participants',
            'participants' => $participants,
        ]);
    }
}