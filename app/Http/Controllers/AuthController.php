<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CustomEmailVerification;

class AuthController extends Controller
{
    public function createLogin()
    {
        return inertia('Auth/Login', [
            'success' => session('success'),
            'invalidEmail' => session('invalidEmail'),
            'message'=>session('message'),
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                return back()->with('invalidEmail', 'You must verify your email address.');
            }
            if ($user->role) {
                return redirect()->route('admin');
            }
            return redirect()->intended('/');
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $field = $request->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        $user = User::create($field);
        $user->notify(new CustomEmailVerification($user->id));
        return redirect()->route('login')->with('success', 'You have been registered successfully, please verify your email.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function confirm()
    {

    }
}
