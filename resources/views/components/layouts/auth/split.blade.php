<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" />
    @include('partials.head')
</head>

<body class="min-h-screen bg-white antialiased dark:bg-gradient-to-b dark:from-neutral-950 dark:to-neutral-900">
    <div
        class="relative grid h-screen flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">

        <!-- Left Panel: Inspirational Quote + Branding + Background Image -->
        <div
            class="relative hidden h-full flex-col p-10 lg:flex overflow-hidden rounded-tr-3xl dark:border-e dark:border-neutral-800">

            <!-- Background Image -->
            <img src="{{ asset('images/test2.jpg') }}" alt="BMA Background"
                class="absolute inset-0 h-full w-full  object-center opacity-100 z-0">

            <!-- Branding -->
            <a href="{{ route('home') }}" class="relative z-20 flex items-center gap-3 text-lg font-semibold">
                <img src="{{ asset('images/logo-main.png') }}" alt="BMA Logo" />
                <span class="text-white text-xl font-bold">BMA Job Application Portal</span>
            </a>
        </div>

        <div class="absolute bottom-6 left-6 z-20 max-w-md">
            <p class="text-white text-sm leading-relaxed">
                “A World Class Centre for Maritime Education and Training.”
            </p>
            <p class="mt-2 text-xs text-neutral-200">
                © {{ date('Y') }} Bandari Maritime Academy
            </p>
        </div>
        <!-- Right Panel: Login / Form -->
        <div class="w-full lg:p-8 flex items-center justify-center">
            <div class="mx-auto w-full max-w-sm flex-col justify-center space-y-6 sm:w-[350px]">
                <!-- Logo for small screens -->
                <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium " wire:navigate>
                    <img src="{{ asset('images/logo-main.png') }}" alt="BMA Logo" />
                    <span class="sr-only">BMA Jobs Portal</span>
                </a>
                <!-- Slot for login/register form -->
                {{ $slot }}
            </div>
        </div>
    </div>
    @fluxScripts
</body>

</html>
