<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="SudutCerita — Platform bimbingan dan konseling sekolah yang ramah, aman, dan tepercaya. Ceritakan keluhanmu secara nyaman langsung kepada Guru BK pilihanmu.">
    <title>SudutCerita — Layanan Bimbingan & Konseling Sekolah</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --color-primary: #D4734A;
            --color-primary-hover: #C0613B;
            --color-bg: #FDF6F0;
            --color-bg-white: #FFFFFF;
            --color-text-dark: #2D2D2D;
            --color-text-muted: #8A8A8A;
            --color-text-body: #6B6B6B;
            --color-border: #E8E0D8;
            --color-icon-bg: #FFF0E9;
            --color-pink-blob: #FBDDD3;
        }
    </style>
</head>
<body class="font-sans antialiased" style="background-color: var(--color-bg); color: var(--color-text-dark);">

    {{-- ═══════════════════ NAVBAR ═══════════════════ --}}
    <nav class="w-full" style="background-color: var(--color-bg);">
        <div class="max-w-6xl mx-auto px-6 py-5 flex items-center justify-between">
            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-2.5 group">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background-color: var(--color-primary);">
                    <svg class="w-5.5 h-5.5 text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" opacity="0.9"/>
                        <path d="M12 8.5c-1.657 0-3 1.12-3 2.5 0 .89.534 1.671 1.333 2.143V15l1.667-1.143h1a2.5 2.5 0 002-1c.333-.5.5-1 .5-1.5 0-1.657-1.567-2.857-3.5-2.857z" fill="white" opacity="0.5"/>
                    </svg>
                </div>
                <span class="text-lg font-bold tracking-tight" style="color: var(--color-text-dark);">Sudut<span style="color: var(--color-primary);">Cerita</span></span>
            </a>

            {{-- Nav Links --}}
            <div class="flex items-center">
                <a href="{{ route('login') }}" class="text-sm font-semibold px-5 py-2.5 rounded-full border-2 transition-all duration-200 hover:text-white" style="color: var(--color-primary); border-color: var(--color-primary); background-color: transparent;" onmouseenter="this.style.backgroundColor='var(--color-primary)'; this.style.color='white'" onmouseleave="this.style.backgroundColor='transparent'; this.style.color='var(--color-primary)'">
                    Login
                </a>
            </div>
        </div>
    </nav>

    {{-- ═══════════════════ HERO SECTION ═══════════════════ --}}
    <section class="w-full" style="background-color: var(--color-bg);">
        <div class="max-w-6xl mx-auto px-6 py-16 md:py-24 flex flex-col md:flex-row items-center gap-12 md:gap-16">

            {{-- Left: Text Content --}}
            <div class="flex-1 max-w-xl">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 mb-6">
                    <span class="text-base">🔒</span>
                    <span class="text-xs font-bold uppercase tracking-widest" style="color: var(--color-primary);">Layanan Aman & Rahasia</span>
                </div>

                {{-- Heading --}}
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6" style="color: var(--color-text-dark); line-height: 1.15;">
                    Selamat Datang di<br>SudutCerita
                </h1>

                {{-- Description --}}
                <p class="text-base leading-relaxed mb-8" style="color: var(--color-text-body);">
                    Platform bimbingan dan konseling sekolah yang ramah, aman, dan tepercaya.
                    Ceritakan keluhan akademik, sosial, maupun perundungan secara nyaman
                    langsung kepada Guru BK pilihanmu.
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('register') }}" class="inline-flex items-center px-7 py-3 rounded-full text-white text-sm font-semibold transition-all duration-200 hover:opacity-90 active:scale-[0.97]" style="background-color: var(--color-primary);">
                        Mulai Sekarang
                    </a>
                    <a href="#tentang-kami" class="inline-flex items-center px-7 py-3 rounded-full text-sm font-semibold border transition-all duration-200 hover:bg-white/60" style="color: var(--color-text-dark); border-color: var(--color-border); background-color: var(--color-bg-white);">
                        Pelajari Alur
                    </a>
                </div>
            </div>

            {{-- Right: Illustration Card --}}
            <div class="flex-1 flex justify-center md:justify-end relative">
                {{-- Pink blob background --}}
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="w-72 h-72 md:w-80 md:h-80 rounded-full opacity-60" style="background-color: var(--color-pink-blob); filter: blur(40px);"></div>
                </div>

                {{-- Card --}}
                <div class="relative bg-white rounded-2xl shadow-lg p-6 w-full max-w-sm border" style="border-color: var(--color-border); box-shadow: 0 8px 32px rgba(212, 115, 74, 0.08);">
                    {{-- Avatars + Badge Row --}}
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center -space-x-2">
                            {{-- Avatar 1 --}}
                            <div class="w-9 h-9 rounded-full border-2 border-white flex items-center justify-center text-xs font-bold text-white" style="background-color: #D4734A;">
                                S
                            </div>
                            {{-- Avatar 2 --}}
                            <div class="w-9 h-9 rounded-full border-2 border-white flex items-center justify-center text-xs font-bold text-white" style="background-color: #E8956F;">
                                G
                            </div>
                        </div>
                        <span class="text-xs font-semibold px-3 py-1 rounded-full" style="background-color: #E8F5E8; color: #3D9E3D;">
                            Selesai
                        </span>
                    </div>

                    {{-- Card Title --}}
                    <h3 class="text-sm font-bold mb-3" style="color: var(--color-text-dark);">
                        Pendampingan Siswa Aktif
                    </h3>

                    {{-- Quote --}}
                    <div class="rounded-xl p-4 mb-4" style="background-color: #FFF5F0;">
                        <p class="text-sm italic leading-relaxed" style="color: var(--color-text-body);">
                            "Terima kasih Ibu Sri, sekarang saya merasa jauh lebih tenang dan fokus belajar di kelas."
                        </p>
                    </div>

                    {{-- Privacy Badge --}}
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="#D4734A" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <span class="text-xs font-medium" style="color: var(--color-primary);">
                            Identitas dirahasiakan sepenuhnya
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════ FEATURES SECTION ═══════════════════ --}}
    <section id="tentang-kami" class="w-full" style="background-color: var(--color-bg-white);">
        <div class="max-w-6xl mx-auto px-6 py-20 md:py-28">

            {{-- Section Heading --}}
            <div class="text-center mb-14">
                <h2 class="text-2xl md:text-3xl font-bold mb-4" style="color: var(--color-text-dark);">
                    Mengapa Memilih SudutCerita?
                </h2>
                <p class="text-sm md:text-base max-w-lg mx-auto leading-relaxed" style="color: var(--color-text-muted);">
                    Kami merancang platform bimbingan konseling ini dengan fokus penuh pada
                    kenyamanan dan perlindungan siswa.
                </p>
            </div>

            {{-- Feature Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Card 1: Aman & Rahasia --}}
                <div class="rounded-2xl border p-7 transition-all duration-300 hover:shadow-md hover:-translate-y-1" style="border-color: var(--color-border); background-color: var(--color-bg-white);">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5" style="background-color: var(--color-icon-bg);">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="#D4734A" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-2" style="color: var(--color-text-dark);">Aman & Rahasia</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--color-text-body);">
                        Keluhanmu hanya akan dibaca dan direspon oleh Guru BK pilihanmu. Kerahasiaan data siswa terjaga 100%.
                    </p>
                </div>

                {{-- Card 2: Mudah Digunakan --}}
                <div class="rounded-2xl border p-7 transition-all duration-300 hover:shadow-md hover:-translate-y-1" style="border-color: var(--color-border); background-color: var(--color-bg-white);">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5" style="background-color: var(--color-icon-bg);">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="#D4734A" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-2" style="color: var(--color-text-dark);">Mudah Digunakan</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--color-text-body);">
                        Ajukan keluhan atau buat janji temu konsultasi secara online hanya dalam beberapa langkah cepat dari ponselmu.
                    </p>
                </div>

                {{-- Card 3: Respon Cepat --}}
                <div class="rounded-2xl border p-7 transition-all duration-300 hover:shadow-md hover:-translate-y-1" style="border-color: var(--color-border); background-color: var(--color-bg-white);">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5" style="background-color: var(--color-icon-bg);">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="#D4734A" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-2" style="color: var(--color-text-dark);">Respon Cepat</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--color-text-body);">
                        Guru BK siap merespon dan mendampingi keluhanmu agar masalahmu segera menemukan solusi terbaik.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════ FOOTER ═══════════════════ --}}
    <footer class="w-full border-t" style="background-color: var(--color-bg); border-color: var(--color-border);">
        <div class="max-w-6xl mx-auto px-6 py-6 flex flex-col md:flex-row items-center justify-between gap-3">
            <p class="text-xs" style="color: var(--color-text-muted);">
                RuangBK &copy; {{ date('Y') }} &bull; SMKS WIKRAMA BOGOR
            </p>
            <p class="text-xs" style="color: var(--color-text-muted);">
                Layanan BK digital ramah siswa.
            </p>
        </div>
    </footer>


</body>
</html>
