<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Registration successful', 'user' => $user]);
    }

    public function login(Request $request)
    {
        $token = Auth::attempt($request->only('email', 'password'));

        if (!$token) {
            return redirect()->back()->with('failed', 'Email atau Password salah');
        }

        $user = Auth::user();

        return redirect()->route('product.index')->with('success', 'Login berhasil.');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
