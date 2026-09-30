<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk - Ruang BK (Bimbingan & Konseling)</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans antialiased" style="background-color: #FDF6F0;">

    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-12">

        {{-- Logo & Branding --}}
        <div class="mb-8 flex flex-col items-center">
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-4" style="background-color: #D4734A;">
                <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" opacity="0.9"/>
                    <path d="M12 8.5c-1.657 0-3 1.12-3 2.5 0 .89.534 1.671 1.333 2.143V15l1.667-1.143h1a2.5 2.5 0 002-1c.333-.5.5-1 .5-1.5 0-1.657-1.567-2.857-3.5-2.857z" fill="white" opacity="0.5"/>
                </svg>
            </div>
            <h1 class="text-2xl font-bold tracking-tight" style="color: #2D2D2D;">SudutCerita</h1>
        </div>

        {{-- Heading --}}
        <div class="text-center mb-8">
            <h2 class="text-xl font-bold" style="color: #2D2D2D;">Masuk ke SudutCerita</h2>
            <p class="text-sm mt-2" style="color: #8A8A8A;">Masukkan email dan kata sandi akun Anda untuk melanjutkan.</p>
        </div>

        {{-- Flash Status (e.g. Logout) --}}
        @if (session('status'))
            <div class="w-full max-w-lg mb-4 p-4 rounded-xl border flex items-start gap-3" style="background-color: #F0FAF0; border-color: #C3E6C3;">
                <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="#3D9E3D">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-sm font-medium" style="color: #2D7A2D;">{{ session('status') }}</p>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="w-full max-w-lg mb-4 p-4 rounded-xl border flex items-start gap-3" style="background-color: #FFF5F5; border-color: #FECACA;">
                <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="#DC2626">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <div class="text-sm" style="color: #B91C1C;">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Form Card --}}
        <div class="w-full max-w-lg bg-white rounded-2xl border p-8 sm:p-10" style="border-color: #E8E0D8; box-shadow: 0 1px 3px rgba(0,0,0,0.04);">
            <form method="POST" action="{{ route('login.process') }}" id="loginForm">
                @csrf
                {{-- Email / NISN Field --}}
                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold mb-2" style="color: #2D2D2D;">
                        NIS / Email
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        placeholder="Masukkan nomor induk atau email Anda..."
                        class="w-full px-4 py-3 rounded-xl text-sm transition-all duration-200 focus:outline-none focus:ring-2"
                        style="background-color: #F9F5F1; border: 1px solid #E0D8D0; color: #2D2D2D; --tw-ring-color: #D4734A;"
                    />
                </div>

                {{-- Password Field --}}
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-semibold" style="color: #2D2D2D;">
                            Kata Sandi
                        </label>
                        <span class="text-sm font-medium cursor-pointer hover:underline" style="color: #D4734A;">
                            Lupa Password?
                        </span>
                    </div>
                    <div class="relative">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="••••••••••••••••••••"
                            class="w-full px-4 py-3 pr-12 rounded-xl text-sm transition-all duration-200 focus:outline-none focus:ring-2"
                            style="background-color: #F9F5F1; border: 1px solid #E0D8D0; color: #2D2D2D; --tw-ring-color: #D4734A;"
                        />
                        <button
                            type="button"
                            id="togglePassword"
                            class="absolute inset-y-0 right-0 pr-4 flex items-center focus:outline-none cursor-pointer"
                            style="color: #B0A89E;"
                            aria-label="Tampilkan atau sembunyikan kata sandi"
                        >
                            <svg id="eyeIcon" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eyeSlashIcon" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Submit Button --}}
                <button
                    type="submit"
                    class="w-full py-3 px-4 rounded-full text-white font-semibold text-sm transition-all duration-200 cursor-pointer hover:opacity-90 active:scale-[0.98]"
                    style="background-color: #D4734A;"
                >
                    Masuk Akun
                </button>
            </form>

            {{-- Register Link --}}
            <p class="mt-6 text-center text-sm" style="color: #8A8A8A;">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-semibold hover:underline" style="color: #D4734A;">
                    Daftar Sekarang
                </a>
            </p>
        </div>

        {{-- Footer Info --}}
        <div class="mt-10 text-center max-w-lg">
            <p class="text-xs leading-relaxed" style="color: #B0A89E;">
                Akses portal ini disesuaikan untuk peran
                <span class="font-semibold" style="color: #D4734A;">Siswa</span>,
                <span class="font-semibold" style="color: #D4734A;">Konselor (Guru BK)</span>, maupun
                <span class="font-semibold" style="color: #D4734A;">Admin Sekolah</span>.
                Sesi aktif Anda sepenuhnya diamankan oleh enkripsi sekolah.
            </p>
        </div>

    </div>

    <script>
        const toggleBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        const eyeSlashIcon = document.getElementById('eyeSlashIcon');

        if (toggleBtn && passwordInput) {
            toggleBtn.addEventListener('click', () => {
                const isPassword = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                eyeIcon.classList.toggle('hidden', isPassword);
                eyeSlashIcon.classList.toggle('hidden', !isPassword);
            });
        }
    </script>
</body>
</html>
