<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginPengunjungController extends Controller
{
    // Tampilkan halaman login pengunjung
    public function showLoginForm()
    {
        return view('pengunjung.login', ['title' => 'Login Pengunjung']);
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'pengunjung') {
                return redirect('/')->with('success', 'Login berhasil sebagai pengunjung.');
            } else {
                Auth::logout();
                return redirect()->back()->with('alert', 'Akun ini bukan pengunjung.');
            }
        }

        return redirect()->back()->with('alert', 'Email atau password salah.');
    }

    // Logout pengunjung
    public function logout()
    {
        Auth::logout();
        return redirect('/login-pengunjung')->with('success', 'Anda telah logout.');
    }
}
