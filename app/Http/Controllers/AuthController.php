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
        // dd($request);
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

        return redirect('/article') -> with('success', 'Selamat Bergabung 🤠🚀'. $validated['name']. ', silahkan login 😋' );
    }

    public function loginForm() {
        return view('auth/login');
    }

    public function login(Request $request) {
        // dd($request);
        $credentials = $request->validate([
            'email' => 'required|email:rfc, dns',
            'password' => 'required'
        ]);
        $remember = $request->input('remember');
        // dd($remember);

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
 
            return redirect('/article')->with('success', 'Welcome Back!🤠🚀 '. Auth::user()->name);
        }
        return back()->withErrors([
            'email' => 'Invalid email or password. Please try again.',
        ])->onlyInput('email');
    }

    public function logout (Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
 
    return redirect ('/');
    }
}
