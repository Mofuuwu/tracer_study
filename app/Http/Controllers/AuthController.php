<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function do_login(Request $request)
    {
        $validatedRequest = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt(['email' => $validatedRequest['email'], 'password' => $validatedRequest['password']])) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard')->with('success', 'Login berhasil!');
        }
        return back()->with('error', 'Login Gagal, Email Atau Password Salah');
    }


    public function do_register(Request $request)
    {
        $validatedRequest = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
        DB::beginTransaction(); 
        try {
            $user = User::create([
                'email' => $validatedRequest['email'],
                'password' => bcrypt($validatedRequest['password'])
            ]);
            Mahasiswa::create([
                'user_id' => $user->id,
                'nama' => $validatedRequest['nama'],
                'email' => $validatedRequest['email'],
            ]);
            DB::commit(); 
            return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
        } catch (\Exception $e) {
            DB::rollBack(); 
            return back()->with('error', 'Registrasi gagal, silakan coba lagi.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
