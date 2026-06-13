<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Trainer list'
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'message' => 'Trainer details',
            'id' => $id
        ]);
    }
}