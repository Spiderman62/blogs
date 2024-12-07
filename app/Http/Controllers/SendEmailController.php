<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\CustomEmailVerification;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SendEmailController extends Controller
{
    public function notice()
    {
        return inertia('Auth/SendEmail', [
            'message' => session('message'),
            'error'=>session('error')
        ]);
    }

    public function handler(Request $request)
    {
        $user = User::find($request->route('id'));
        if (!$user) {
            return redirect()->route('verification.notice')->with('error', 'User not found!');
        }
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
        return redirect()->route('login')->with('message', 'Your email has been verified, now you can login!');
    }
    public function resend(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $user = User::where('email', $request->input('email'))->first();

        if ($user && !$user->hasVerifiedEmail()) {
            $user->notify(new CustomEmailVerification($user->id));
            return back()->with('message', 'Verification link sent!');
        }
        return back()->with('error', 'Email has already been verified or does not exist.');
    }
}
