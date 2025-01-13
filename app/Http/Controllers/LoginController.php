<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store() {
        $validated = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($validated)) {
            return back()->withErrors([
                'login' => 'Nesprávny e-mail alebo heslo.',
            ]);
        }

        request()->session()->regenerate();

        return redirect('/');
    }

    public function destroy() {
        Auth::logout();

        return redirect('/');
    }
}
