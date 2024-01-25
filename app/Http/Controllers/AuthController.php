<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm() {
        return view('auth/register');
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email:rfc, dns',
            'password' => 'required'
        ]);
        // insert data 
        DB::table('users')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/article') -> with('success', 'Welcome Back!'. $validated['name']);
    }

    public function loginForm() {
        return view('auth/login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:rfc, dns',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('/article')->with('success', 'Welcome Back!'. Auth::user()->name);
        }
        return back()->withErrors([
            'email' => 'Invalid email or password. Please try again.',
        ])->onlyInput('email');
    }
}
