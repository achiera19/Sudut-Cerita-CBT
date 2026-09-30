<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Murid - SudutCerita</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --color-primary: #D4734A;
            --color-primary-light: #FFF0E9;
            --color-primary-bg: #FEF3ED;
            --color-bg: #FDF6F0;
            --color-text-dark: #2D2D2D;
            --color-text-muted: #8A8A8A;
            --color-text-body: #6B6B6B;
            --color-border: #E8E0D8;
            --color-sidebar-bg: #FDF6F0;
            --color-card-bg: #FFFFFF;
        }

        /* Scrollbar styling */
        .sidebar-nav::-webkit-scrollbar { width: 4px; }
        .sidebar-nav::-webkit-scrollbar-track { background: transparent; }
        .sidebar-nav::-webkit-scrollbar-thumb { background: var(--color-border); border-radius: 10px; }
    </style>
</head>
<body class="h-full font-sans antialiased" style="background-color: var(--color-bg);">

    <div class="flex h-screen overflow-hidden">

        {{-- ═══════════ SIDEBAR ═══════════ --}}
        <aside class="hidden lg:flex flex-col w-60 shrink-0 border-r" style="background-color: var(--color-sidebar-bg); border-color: var(--color-border);">

            {{-- Logo --}}
            <div class="px-6 pt-6 pb-4">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background-color: var(--color-primary);">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" opacity="0.9"/>
                            <path d="M12 8.5c-1.657 0-3 1.12-3 2.5 0 .89.534 1.671 1.333 2.143V15l1.667-1.143h1a2.5 2.5 0 002-1c.333-.5.5-1 .5-1.5 0-1.657-1.567-2.857-3.5-2.857z" fill="white" opacity="0.5"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-sm font-bold" style="color: var(--color-text-dark);">Sudut<span style="color: var(--color-primary);">Cerita</span></span>
                        <span class="block text-[10px] font-bold uppercase tracking-widest" style="color: var(--color-primary);">MURID</span>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-4 py-2 sidebar-nav overflow-y-auto">
                <ul class="space-y-1">
                    {{-- Beranda (Active) --}}
                    <li>
                        <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold text-white" style="background-color: var(--color-primary);">
                            <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Beranda
                        </a>
                    </li>
                    {{-- Cerita Saya --}}
                    <li>
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors hover:bg-white/60" style="color: var(--color-text-body);">
                            <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            Cerita Saya
                        </a>
                    </li>
                    {{-- Ajukan Keluhan --}}
                    <li>
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors hover:bg-white/60" style="color: var(--color-text-body);">
                            <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Ajukan Keluhan
                        </a>
                    </li>
                    {{-- Lapor Murid --}}
                    <li>
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors hover:bg-white/60" style="color: var(--color-text-body);">
                            <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Lapor Murid
                        </a>
                    </li>
                </ul>
            </nav>

            {{-- User Profile & Logout --}}
            <div class="px-4 pb-5">
                <div class="flex items-center gap-3 px-3 py-3 rounded-xl mb-2" style="background-color: rgba(212,115,74,0.06);">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-xs font-bold text-white shrink-0" style="background-color: var(--color-primary);">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold truncate" style="color: var(--color-text-dark);">{{ Auth::user()->name }}</p>
                        <p class="text-[11px] truncate" style="color: var(--color-text-muted);">{{ Auth::user()->kelas ?? 'Murid' }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 px-3 py-2 text-sm font-medium cursor-pointer transition-colors hover:opacity-80" style="color: var(--color-primary);">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Keluar Akun
                    </button>
                </form>
            </div>
        </aside>

        {{-- ═══════════ MOBILE HEADER ═══════════ --}}
        <div class="lg:hidden fixed top-0 left-0 right-0 z-40 border-b px-4 py-3 flex items-center justify-between" style="background-color: var(--color-bg); border-color: var(--color-border);">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background-color: var(--color-primary);">
                    <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" opacity="0.9"/>
                    </svg>
                </div>
                <span class="text-sm font-bold" style="color: var(--color-text-dark);">Sudut<span style="color: var(--color-primary);">Cerita</span></span>
            </div>
            <button id="mobileMenuToggle" class="p-1.5 cursor-pointer" aria-label="Menu">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="var(--color-text-dark)" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        {{-- ═══════════ MAIN CONTENT ═══════════ --}}
        <main class="flex-1 overflow-y-auto lg:pt-0 pt-14">
            <div class="max-w-5xl mx-auto px-6 py-8">

                {{-- Header: Greeting + Notification --}}
                <div class="flex items-start justify-between mb-8">
                    <div>
                        <h1 class="text-2xl font-bold" style="color: var(--color-text-dark);">
                            Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋
                        </h1>
                        <p class="text-sm mt-1" style="color: var(--color-text-muted);">
                            {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y') }} • SMKS Wikrama Bogor
                        </p>
                    </div>
                    <button class="w-10 h-10 rounded-xl border flex items-center justify-center transition hover:bg-white" style="border-color: var(--color-border);">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="var(--color-text-muted)" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                </div>

                {{-- CTA Banner: Ceritakan Kisahmu --}}
                <div class="rounded-2xl p-6 sm:p-8 mb-8 relative overflow-hidden" style="background-color: var(--color-primary-bg);">
                    <div class="relative z-10 max-w-md">
                        <h2 class="text-xl sm:text-2xl font-bold mb-3" style="color: var(--color-text-dark);">
                            Ceritakan Kisahmu
                        </h2>
                        <p class="text-sm leading-relaxed mb-5" style="color: var(--color-text-body);">
                            Ada yang ingin kamu sampaikan? Tulis cerita atau keluhanmu di sini secara aman. Guru BK siap mendengarkan bimbingan terbaik untukmu.
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-white text-sm font-semibold transition hover:opacity-90" style="background-color: var(--color-primary);">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Tulis Cerita Sekarang
                        </a>
                    </div>
                    {{-- Decorative icon --}}
                    <div class="absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 opacity-20 sm:opacity-30">
                        <svg class="w-28 h-28 sm:w-36 sm:h-36" viewBox="0 0 24 24" fill="var(--color-primary)">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </div>
                </div>

                {{-- Stats Row --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                    {{-- Cerita Terkirim --}}
                    <div class="bg-white rounded-2xl border p-5" style="border-color: var(--color-border);">
                        <p class="text-xs font-medium mb-3" style="color: var(--color-text-muted);">Cerita Terkirim</p>
                        <div class="flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full" style="background-color: var(--color-text-dark);"></span>
                            <span class="text-2xl font-bold" style="color: var(--color-text-dark);">3</span>
                        </div>
                    </div>
                    {{-- Menunggu Respon --}}
                    <div class="bg-white rounded-2xl border p-5" style="border-color: var(--color-border);">
                        <p class="text-xs font-medium mb-3" style="color: var(--color-text-muted);">Menunggu Respon</p>
                        <div class="flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full" style="background-color: var(--color-primary);"></span>
                            <span class="text-2xl font-bold" style="color: var(--color-text-dark);">1</span>
                        </div>
                    </div>
                    {{-- Selesai --}}
                    <div class="bg-white rounded-2xl border p-5" style="border-color: var(--color-border);">
                        <p class="text-xs font-medium mb-3" style="color: var(--color-text-muted);">Selesai</p>
                        <div class="flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full" style="background-color: #5B9BD5;"></span>
                            <span class="text-2xl font-bold" style="color: var(--color-text-dark);">2</span>
                        </div>
                    </div>
                </div>

                {{-- Cerita Terakhir + Sidebar --}}
                <div class="flex flex-col lg:flex-row gap-6">

                    {{-- Left: Cerita Terakhir --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-5">
                            <h3 class="text-base font-bold" style="color: var(--color-text-dark);">Cerita Terakhir</h3>
                            <a href="#" class="text-sm font-semibold hover:underline" style="color: var(--color-primary);">Lihat Semua Cerita</a>
                        </div>

                        <div class="space-y-4">
                            {{-- Card 1: Diproses --}}
                            <div class="bg-white rounded-2xl border p-5" style="border-color: var(--color-border);">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-xs font-semibold px-3 py-1 rounded-full" style="background-color: var(--color-primary-light); color: var(--color-primary);">
                                        Akademik & Minat Belajar
                                    </span>
                                    <span class="flex items-center gap-1.5 text-xs font-medium" style="color: var(--color-primary);">
                                        <span class="w-2 h-2 rounded-full" style="background-color: var(--color-primary);"></span>
                                        Diproses
                                    </span>
                                </div>
                                <h4 class="text-sm font-bold mb-2" style="color: var(--color-text-dark);">
                                    Kesulitan Membagi Waktu Antara Organisasi dan Belajar
                                </h4>
                                <p class="text-xs leading-relaxed mb-4" style="color: var(--color-text-body);">
                                    Saya merasa belakangan ini nilai ujian saya menurun drastis semenjak aktif di kepengurusan OSIS sekolah. Ingin konsultasi cara membuat jadwal harian yang seimbang.
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="flex items-center gap-1.5 text-xs" style="color: var(--color-text-muted);">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Kemarin, 13:45 WIB
                                    </span>
                                    <a href="#" class="text-xs font-semibold flex items-center gap-1 hover:underline" style="color: var(--color-primary);">
                                        Lihat Detail
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            {{-- Card 2: Selesai --}}
                            <div class="bg-white rounded-2xl border p-5" style="border-color: var(--color-border);">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-xs font-semibold px-3 py-1 rounded-full" style="background-color: var(--color-primary-light); color: var(--color-primary);">
                                        Sosial & Pertemanan
                                    </span>
                                    <span class="flex items-center gap-1.5 text-xs font-medium" style="color: #3D9E3D;">
                                        <span class="w-2 h-2 rounded-full" style="background-color: #3D9E3D;"></span>
                                        Selesai
                                    </span>
                                </div>
                                <h4 class="text-sm font-bold mb-2" style="color: var(--color-text-dark);">
                                    Masalah Kesalahpahaman dengan Teman Sekelas
                                </h4>
                                <p class="text-xs leading-relaxed mb-4" style="color: var(--color-text-body);">
                                    Ada ketegangan kelompok belajar di kelas XI IPA 2 akibat perbedaan pendapat pengerjaan tugas proyek akhir. Mengharapkan mediasi atau tips komunikasi.
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="flex items-center gap-1.5 text-xs" style="color: var(--color-text-muted);">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        10 Okt 2024
                                    </span>
                                    <a href="#" class="text-xs font-semibold flex items-center gap-1 hover:underline" style="color: var(--color-primary);">
                                        Lihat Detail
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            {{-- Card 3: Selesai --}}
                            <div class="bg-white rounded-2xl border p-5" style="border-color: var(--color-border);">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-xs font-semibold px-3 py-1 rounded-full" style="background-color: var(--color-primary-light); color: var(--color-primary);">
                                        Bullying & Kebersamaan
                                    </span>
                                    <span class="flex items-center gap-1.5 text-xs font-medium" style="color: #3D9E3D;">
                                        <span class="w-2 h-2 rounded-full" style="background-color: #3D9E3D;"></span>
                                        Selesai
                                    </span>
                                </div>
                                <h4 class="text-sm font-bold mb-2" style="color: var(--color-text-dark);">
                                    Sering Mendapat Sindiran Tidak Menyenangkan
                                </h4>
                                <p class="text-xs leading-relaxed mb-4" style="color: var(--color-text-body);">
                                    Sering sekali kelompok anak kelas sebelah melontarkan perkataan kurang ramah saat jam istirahat tiba di koridor utama sekolah.
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="flex items-center gap-1.5 text-xs" style="color: var(--color-text-muted);">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        05 Okt 2024
                                    </span>
                                    <a href="#" class="text-xs font-semibold flex items-center gap-1 hover:underline" style="color: var(--color-primary);">
                                        Lihat Detail
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right: Kepedulian Teman Sebaya --}}
                    <div class="w-full lg:w-72 shrink-0">
                        <div class="bg-white rounded-2xl border p-6 sticky top-8" style="border-color: var(--color-border);">
                            {{-- Icon --}}
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4" style="background-color: var(--color-primary-light);">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="var(--color-primary)" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>

                            <h4 class="text-base font-bold mb-3" style="color: var(--color-text-dark);">
                                Kepedulian Teman Sebaya
                            </h4>

                            <p class="text-xs leading-relaxed mb-5" style="color: var(--color-text-body);">
                                Melihat temanmu terlihat murung atau membutuhkan bantuan moral dari guru BK? Laporkan situasi mereka agar guru BK dapat membantu mendampingi secara bijak.
                            </p>

                            <a href="#" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-full border text-sm font-semibold transition hover:bg-orange-50" style="color: var(--color-primary); border-color: var(--color-primary);">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                Lapor demi Kebaikan Teman
                            </a>

                            <div class="flex items-start gap-2 mt-4 pt-4 border-t" style="border-color: var(--color-border);">
                                <svg class="w-4 h-4 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="var(--color-text-muted)" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <p class="text-[11px] leading-relaxed" style="color: var(--color-text-muted);">
                                    Laporan ini murni atas rasa peduli keselamatan sesama siswa. Privasi pelapor terjaga sepenuhnya.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

    </div>

    {{-- Mobile menu overlay --}}
    <div id="mobileOverlay" class="fixed inset-0 bg-black/30 z-40 hidden lg:hidden"></div>
    <div id="mobileSidebar" class="fixed top-0 left-0 bottom-0 w-64 z-50 transform -translate-x-full transition-transform duration-300 lg:hidden border-r" style="background-color: var(--color-sidebar-bg); border-color: var(--color-border);">
        <div class="p-5">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background-color: var(--color-primary);">
                        <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" opacity="0.9"/>
                        </svg>
                    </div>
                    <span class="text-sm font-bold" style="color: var(--color-text-dark);">Sudut<span style="color: var(--color-primary);">Cerita</span></span>
                </div>
                <button id="closeMobileMenu" class="p-1 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="var(--color-text-dark)" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <nav>
                <ul class="space-y-1">
                    <li><a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold text-white" style="background-color: var(--color-primary);">Beranda</a></li>
                    <li><a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium" style="color: var(--color-text-body);">Cerita Saya</a></li>
                    <li><a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium" style="color: var(--color-text-body);">Ajukan Keluhan</a></li>
                    <li><a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium" style="color: var(--color-text-body);">Lapor Murid</a></li>
                </ul>
            </nav>
            <div class="mt-6 pt-4 border-t" style="border-color: var(--color-border);">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 px-3 py-2 text-sm font-medium cursor-pointer" style="color: var(--color-primary);">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Keluar Akun
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const mobileToggle = document.getElementById('mobileMenuToggle');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const closeBtn = document.getElementById('closeMobileMenu');

        function openMenu() {
            mobileSidebar.classList.remove('-translate-x-full');
            mobileOverlay.classList.remove('hidden');
        }
        function closeMenu() {
            mobileSidebar.classList.add('-translate-x-full');
            mobileOverlay.classList.add('hidden');
        }

        if (mobileToggle) mobileToggle.addEventListener('click', openMenu);
        if (closeBtn) closeBtn.addEventListener('click', closeMenu);
        if (mobileOverlay) mobileOverlay.addEventListener('click', closeMenu);
    </script>

</body>
</html>
