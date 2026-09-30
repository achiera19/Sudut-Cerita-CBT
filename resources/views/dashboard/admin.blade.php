<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - SudutCerita</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans antialiased flex items-center justify-center" style="background-color: #FDF6F0;">
    <div class="text-center">
        <p class="text-sm" style="color: #8A8A8A;">Dashboard Admin — {{ Auth::user()->name }}</p>
        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="text-sm font-semibold cursor-pointer hover:underline" style="color: #D4734A;">Keluar Akun</button>
        </form>
    </div>
</body>
</html>
