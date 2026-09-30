<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return match (Auth::user()->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'counselor' => redirect()->route('counselor.dashboard'),
                default => redirect()->route('user.dashboard'),
            };
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email atau kata sandi yang Anda masukkan salah.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return match (Auth::user()->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'counselor' => redirect()->route('counselor.dashboard'),
            default => redirect()->route('user.dashboard'),
        };
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Anda telah berhasil keluar dari akun.');
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return match (Auth::user()->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'counselor' => redirect()->route('counselor.dashboard'),
                default => redirect()->route('user.dashboard'),
            };
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255', 'unique:users,email',
                function (string $attribute, mixed $value, \Closure $fail) {
                    $domain = strtolower(substr(strrchr($value, '@'), 1));
                    $allowedDomains = ['gmail.com', 'yahoo.com', 'yahoo.co.id', 'outlook.com', 'hotmail.com', 'icloud.com'];
                    $allowedSuffixes = ['.sch.id', '.ac.id', '.go.id'];

                    $isAllowed = in_array($domain, $allowedDomains)
                        || collect($allowedSuffixes)->contains(fn (string $suffix) => str_ends_with($domain, $suffix));

                    if (! $isAllowed) {
                        $fail('Gunakan email resmi (Gmail, Yahoo, Outlook) atau email sekolah (.sch.id).');
                    }
                },
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('status', 'Akun berhasil dibuat! Silakan masuk dengan email dan kata sandi Anda.');
    }
}
