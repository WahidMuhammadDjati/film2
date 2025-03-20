<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Proses login user.
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Proses login
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Set pesan flash 
            session()->flash('welcome_message', 'Selamat datang, ' . $user->name . '!');

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'author') {
                return redirect()->route('user.dashboard'); 
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/dashbord');
    }
    public function logouta(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
