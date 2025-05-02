<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan Form Login
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan ini mengarah ke halaman login
    }

    // Proses Login
    public function login(Request $request)
    {
        // Validasi input user
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Tentukan apakah "Remember Me" dicentang
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('login')->with('success', 'Selamat datang, Anda berhasil login!');
        }
        
        // Kembali ke form login jika gagal dengan session flash (agar bisa dipakai untuk pop-up)
        return back()->with('error', 'Email atau password yang Anda masukkan salah.')->withInput();
    }

    // Menampilkan Form Register
    public function showRegisterForm()
    {
        return view('auth.register'); // Pastikan ini mengarah ke halaman register
    }

    // Proses Register
    public function register(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Menyimpan data ke database
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Login pengguna otomatis setelah registrasi
        auth()->login($user);

        // Arahkan ke dashboard setelah registrasi
        return redirect()->route('dashboard');
    }

    // Proses Logout
    public function logout()
    {
        Auth::logout(); // Logout user
        return redirect()->route('auth.login'); // Redirect ke halaman login setelah logout
    }
}
