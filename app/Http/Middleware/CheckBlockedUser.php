<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBlockedUser
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_blocked) {
            auth()->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'email' => 'Your account has been blocked.'
            ]);
        }

        return $next($request);
    }
}