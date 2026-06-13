<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Class list'
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'message' => 'Class details',
            'id' => $id
        ]);
    }

    public function create()
    {
        return response()->json([
            'message' => 'Create class form'
        ]);
    }

    public function store()
    {
        return response()->json([
            'message' => 'Class created'
        ]);
    }

    public function edit($id)
    {
        return response()->json([
            'message' => 'Edit class',
            'id' => $id
        ]);
    }

    public function update($id)
    {
        return response()->json([
            'message' => 'Class updated',
            'id' => $id
        ]);
    }

    public function destroy($id)
    {
        return response()->json([
            'message' => 'Class deleted',
            'id' => $id
        ]);
    }
}