<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return response()->json([
            'message' => 'Admin dashboard'
        ]);
    }

    public function users()
    {
        return response()->json([
            'message' => 'User management'
        ]);
    }

    public function blockUser($id)
    {
        return response()->json([
            'message' => 'User blocked',
            'id' => $id
        ]);
    }
}