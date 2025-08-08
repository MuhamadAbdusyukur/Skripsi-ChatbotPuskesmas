<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
        "title" => "Login"]);
    }

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // === PERBAIKAN: Cek apakah role pengguna ada di daftar role yang diizinkan ===
        $allowedRoles = ['admin', 'super_admin'];
        if (!in_array($user->role, $allowedRoles)) {
            Auth::logout();
            return back()->with('alert', 'Mohon maaf, Anda tidak memiliki akses ke halaman admin.!!🙏');
        }

        // Jika role diizinkan (admin atau super_admin), arahkan ke halaman admin
        return redirect()->intended('/admin');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.'
    ]);
}


        public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function formPengunjungLogin()
{
    return view('pengunjung.login', [
        'title' => 'Login Pengunjung'
    ]);
}

public function loginPengunjung(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role === 'pengunjung') {
            return redirect('/')->with('success', 'Login berhasil sebagai pengunjung.');
        } else {
            Auth::logout();
            return back()->with('alert', 'Mohon maaf kami tidak setujui untuk login, mungkin akun anda  bukan pasien.');
        }
    }

    return back()->with('alert', 'Email atau password salah.');
}

public function logoutPengunjung(Request $request)
{
    Auth::logout(); // Logout user saat ini
    $request->session()->invalidate(); // Hapus session
    $request->session()->regenerateToken(); // Regenerate CSRF token

    return redirect('/')->with('message', 'Berhasil logout');
}


}
