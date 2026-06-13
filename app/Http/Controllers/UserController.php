<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return response()->json([
            'message' => 'User profile'
        ]);
    }

    public function updateProfile()
    {
        return response()->json([
            'message' => 'Profile updated'
        ]);
    }
}