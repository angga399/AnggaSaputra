<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function LoginForm()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $remember = $request->has('remember'); 
        
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended("/");
        }

        return back()->withErrors([
            "email" => "Email atau password salah",
        ]);
    }

    public function registrasiForm()
    {
        return view("register");
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            "nama" => "required|string|max:450",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|confirmed",
        ]);

        $user = User::create([
            "nama" => $validated['nama'],
            "email" => $validated['email'],
            "password" => bcrypt($validated['password']), 
        ]);

        Auth::login($user);
        return redirect("/");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }
    //reset
    
public function ForgotPassword()
{
    return view('auth.forgot-password');
}

public function resetLinkEmail(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
}

public function showResetForm(Request $request, $token)
{
    return view('auth.reset-password', [
        'token' => $token,
        'email' => $request->email
    ]);
}
public function reset(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => bcrypt($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status == Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
}
}