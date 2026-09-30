<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Halaman utama: Tampilkan landing page SudutCerita
Route::get('/', function () {
    if (auth()->check()) {
        return match (auth()->user()->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'counselor' => redirect()->route('counselor.dashboard'),
            default => redirect()->route('user.dashboard'),
        };
    }

    return view('home');
})->name('home');

// Guest Routes (Khusus pengguna yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

// Authenticated Routes (Khusus pengguna yang sudah login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard Siswa / Pengguna Biasa
    Route::get('/dashboard', function () {
        return view('dashboard.user');
    })->middleware('role:user')->name('user.dashboard');

    // Dashboard Guru BK / Konselor
    Route::get('/counselor/dashboard', function () {
        return view('dashboard.counselor');
    })->middleware('role:counselor')->name('counselor.dashboard');

    // Dashboard Administrator
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin');
    })->middleware('role:admin')->name('admin.dashboard');
});
