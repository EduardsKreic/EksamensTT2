<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return response()->json([
            'message' => 'Login page'
        ]);
    }

    public function register()
    {
        return response()->json([
            'message' => 'Register page'
        ]);
    }

    public function logout()
    {
        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}