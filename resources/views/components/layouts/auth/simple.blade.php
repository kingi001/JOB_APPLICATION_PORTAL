<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" />
    @include('partials.head')
</head>

<body class="min-h-screen bg-white antialiased dark:bg-gradient-to-b dark:from-neutral-950 dark:to-neutral-900"
      style="background-image: url('{{ asset('images/bgpattern.gif') }}'); background-repeat: repeat; background-attachment: fixed;">

    <div class="flex flex-col min-h-screen items-center justify-center px-6 md:px-10 py-8 gap-8">

        <!-- Logo & Branding -->
        <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-semibold" wire:navigate>
            <img src="{{ asset('images/web-logo.png') }}" alt="BMA Logo" class="h-16 w-auto">
            <span class="text-xl md:text-2xl tracking-wide text-gray-900 dark:text-white">Bandar Maritime Academy Jobs Portal</span>
        </a>

        <!-- Card / Form Container -->
        <div class="w-full max-w-sm bg-white dark:bg-stone-950 border border-gray-200 dark:border-stone-800 rounded-2xl shadow-xl p-8 animate__animated animate__fadeIn">
            {{ $slot }}
        </div>

        <!-- Optional Footer -->
        <div class="text-center text-sm text-gray-600 dark:text-gray-400 mt-4">
            &copy; {{ date('Y') }} Bandar Maritime Academy. All rights reserved.
        </div>
    </div>

    @fluxScripts

</body>
</html>
