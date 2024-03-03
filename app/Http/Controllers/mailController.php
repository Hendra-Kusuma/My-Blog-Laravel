<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\testMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class mailController extends Controller
{
    public function email() {
        $name = 'hendra';
        Mail::to('test@example.com')->send(new testMail($name));
        return 'email sent';
    }

    public function getForgot(){
        return view('forgot.forgot-password');
    }

    public function sendForgotPassword(Request $request){
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }

    public function getResetPassword(string $token){
        return view('forgot.reset-password', ['token' => $token]) ;
    }

    public function sendResetPassword (Request $request){
        // dd($request);
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);}


    public function getVerification() {
        return view('auth.verification-email');
    }

    public function sendEmailVerification(Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }

    public function verifyEmail(EmailVerificationRequest $request){
        $request->fulfill();
 
        return redirect('/dashboard');
    }
};

