<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Schedule list'
        ]);
    }

    public function create()
    {
        return response()->json([
            'message' => 'Create schedule form'
        ]);
    }

    public function store()
    {
        return response()->json([
            'message' => 'Schedule created'
        ]);
    }

    public function edit($id)
    {
        return response()->json([
            'message' => 'Edit schedule',
            'id' => $id
        ]);
    }

    public function update($id)
    {
        return response()->json([
            'message' => 'Schedule updated',
            'id' => $id
        ]);
    }

    public function destroy($id)
    {
        return response()->json([
            'message' => 'Schedule deleted',
            'id' => $id
        ]);
    }
}