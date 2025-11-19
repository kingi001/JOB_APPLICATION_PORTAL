<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen antialiased bg-neutral-100 dark:bg-gradient-to-b dark:from-neutral-950 dark:to-neutral-900"
      style="background-image: url('{{ asset('images/bgpattern.gif') }}'); background-repeat: repeat; background-attachment: fixed;">

    <div class="flex flex-col min-h-screen items-center justify-center px-4 md:px-10 py-6 gap-8">

        <!-- Logo & Branding -->
        <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-semibold text-gray-900 dark:text-white" wire:navigate>
            <img src="{{ asset('images/logo-main.png') }}" alt="BMA Logo" class="h-14 w-auto">
            <span class="text-xl md:text-2xl tracking-wide">Bandar Maritime Academy Jobs Portal</span>
        </a>

        <!-- Card / Form Container -->
        <div class="w-full max-w-md bg-white dark:bg-stone-950 border border-gray-200 dark:border-stone-800 rounded-2xl shadow-lg p-8">
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
