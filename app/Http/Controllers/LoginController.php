<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create() {
        return view('login');
    }

    public function store() {
        $validated = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        Auth::attempt($validated);

        request()->session()->regenerate();

        return redirect('/');
    }

    public function destroy() {
        Auth::logout();

        return redirect('/');
    }
}
