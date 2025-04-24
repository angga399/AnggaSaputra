<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
            "password" => bcrypt($validated['password']), // Jangan lupa encrypt password!
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
}