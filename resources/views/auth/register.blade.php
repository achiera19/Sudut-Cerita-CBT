<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Akun - SudutCerita</title>

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
                    <path
                        d="M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                        opacity="0.9" />
                    <path
                        d="M12 8.5c-1.657 0-3 1.12-3 2.5 0 .89.534 1.671 1.333 2.143V15l1.667-1.143h1a2.5 2.5 0 002-1c.333-.5.5-1 .5-1.5 0-1.657-1.567-2.857-3.5-2.857z"
                        fill="white" opacity="0.5" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold tracking-tight" style="color: #2D2D2D;">Sudut<span
                    style="color: #D4734A;">Cerita</span></h1>
        </div>

        {{-- Heading --}}
        <div class="text-center mb-8">
            <h2 class="text-xl font-bold" style="color: #2D2D2D;">Daftar Akun Baru</h2>
            <p class="text-sm mt-2" style="color: #8A8A8A;">Buat akun SudutCerita untuk mulai bercerita secara aman.</p>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="w-full max-w-lg mb-4 p-4 rounded-xl border flex items-start gap-3"
                style="background-color: #FFF5F5; border-color: #FECACA;">
                <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="#DC2626">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <div class="text-sm" style="color: #B91C1C;">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Form Card --}}
        <div class="w-full max-w-lg bg-white rounded-2xl border p-8 sm:p-10"
            style="border-color: #E8E0D8; box-shadow: 0 1px 3px rgba(0,0,0,0.04);">
            <form method="POST" action="{{ route('register.process') }}" id="registerForm">
                @csrf

                {{-- Nama Lengkap --}}
                <div class="mb-5">
                    <label for="name" class="block text-sm font-semibold mb-2" style="color: #2D2D2D;">
                        Nama Lengkap
                    </label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        placeholder="Masukkan nama lengkap Anda"
                        class="w-full px-4 py-3 rounded-xl text-sm transition-all duration-200 focus:outline-none focus:ring-2"
                        style="background-color: #F9F5F1; border: 1px solid #E0D8D0; color: #2D2D2D; --tw-ring-color: #D4734A;" />
                </div>

                {{-- Email --}}
                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold mb-2" style="color: #2D2D2D;">
                        Email
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        placeholder="Contoh: murid@sekolah.sch.id"
                        class="w-full px-4 py-3 rounded-xl text-sm transition-all duration-200 focus:outline-none focus:ring-2"
                        style="background-color: #F9F5F1; border: 1px solid #E0D8D0; color: #2D2D2D; --tw-ring-color: #D4734A;" />
                </div>
                <div class="mb-5">
                    <label for="nis" class="block text-sm font-semibold mb-2" style="color: #2D2D2D;">
                        NIS
                    </label>
                    <input id="nis" type="text" name="nis" value="{{ old('nis') }}" required
                        placeholder="Contoh: 12200123"
                        class="w-full px-4 py-3 rounded-xl text-sm transition-all duration-200 focus:outline-none focus:ring-2"
                        style="background-color: #F9F5F1; border: 1px solid #E0D8D0; color: #2D2D2D; --tw-ring-color: #D4734A;" />
                </div>

                <div class="mb-5">
                    <label for="rayon" class="block text-sm font-semibold mb-2" style="color: #2D2D2D;">
                        Rayon
                    </label>
                    <input id="rayon" type="text" name="rayon" value="{{ old('rayon') }}" required
                        placeholder="Contoh: Ciawi 1"
                        class="w-full px-4 py-3 rounded-xl text-sm transition-all duration-200 focus:outline-none focus:ring-2"
                        style="background-color: #F9F5F1; border: 1px solid #E0D8D0; color: #2D2D2D; --tw-ring-color: #D4734A;" />
                </div>

                {{-- Kata Sandi & Konfirmasi Sandi (side by side) --}}
                <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Kata Sandi --}}
                    <div>
                        <label for="password" class="block text-sm font-semibold mb-2" style="color: #2D2D2D;">
                            Kata Sandi
                        </label>
                        <div class="relative">
                            <input id="password" type="password" name="password" required
                                placeholder="Minimal 8 karakter"
                                class="w-full px-4 py-3 pr-11 rounded-xl text-sm transition-all duration-200 focus:outline-none focus:ring-2"
                                style="background-color: #F9F5F1; border: 1px solid #E0D8D0; color: #2D2D2D; --tw-ring-color: #D4734A;" />
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center focus:outline-none cursor-pointer"
                                style="color: #B0A89E;" aria-label="Tampilkan atau sembunyikan kata sandi">
                                <svg id="eyeIcon" class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                </svg>
                                <svg id="eyeOpenIcon" class="w-4.5 h-4.5 hidden" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Konfirmasi Sandi --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold mb-2"
                            style="color: #2D2D2D;">
                            Konfirmasi Sandi
                        </label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                placeholder="Ulangi kata sandi"
                                class="w-full px-4 py-3 pr-11 rounded-xl text-sm transition-all duration-200 focus:outline-none focus:ring-2"
                                style="background-color: #F9F5F1; border: 1px solid #E0D8D0; color: #2D2D2D; --tw-ring-color: #D4734A;" />
                            <button type="button" id="togglePasswordConfirm"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center focus:outline-none cursor-pointer"
                                style="color: #B0A89E;" aria-label="Tampilkan atau sembunyikan konfirmasi kata sandi">
                                <svg id="eyeIconConfirm" class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                </svg>
                                <svg id="eyeOpenIconConfirm" class="w-4.5 h-4.5 hidden" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Terms Checkbox --}}
                <div class="mb-6 flex items-start gap-2.5">
                    <input id="terms" type="checkbox" name="terms" required
                        class="mt-0.5 w-4 h-4 rounded border cursor-pointer"
                        style="border-color: #E0D8D0; accent-color: #D4734A;" />
                    <label for="terms" class="text-sm cursor-pointer" style="color: #6B6B6B;">
                        Saya menyetujui
                        <a href="#" class="font-medium hover:underline" style="color: #D4734A;">Syarat
                            Layanan</a>
                        dan
                        <a href="#" class="font-medium hover:underline" style="color: #D4734A;">Kebijakan
                            Privasi</a>
                        SudutCerita.
                    </label>
                </div>

                {{-- Submit Button --}}
                <button type="submit"
                    class="w-full py-3 px-4 rounded-full text-white font-semibold text-sm transition-all duration-200 cursor-pointer hover:opacity-90 active:scale-[0.98]"
                    style="background-color: #D4734A;">
                    Daftar Sekarang
                </button>
            </form>

            {{-- Login Link --}}
            <p class="mt-6 text-center text-sm" style="color: #8A8A8A;">
                Sudah memiliki akun?
                <a href="{{ route('login') }}" class="font-semibold hover:underline" style="color: #D4734A;">
                    Masuk di Sini
                </a>
            </p>
        </div>

    </div>

    <script>
        // Toggle password visibility
        function setupToggle(toggleId, inputId, slashIconId, openIconId) {
            const toggle = document.getElementById(toggleId);
            const input = document.getElementById(inputId);
            const slashIcon = document.getElementById(slashIconId);
            const openIcon = document.getElementById(openIconId);

            if (toggle && input) {
                toggle.addEventListener('click', () => {
                    const isPassword = input.getAttribute('type') === 'password';
                    input.setAttribute('type', isPassword ? 'text' : 'password');
                    slashIcon.classList.toggle('hidden', isPassword);
                    openIcon.classList.toggle('hidden', !isPassword);
                });
            }
        }

        setupToggle('togglePassword', 'password', 'eyeIcon', 'eyeOpenIcon');
        setupToggle('togglePasswordConfirm', 'password_confirmation', 'eyeIconConfirm', 'eyeOpenIconConfirm');
    </script>
</body>

</html>
