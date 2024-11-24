<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col font-sans text-gray-900 antialiased">
    <div class="flex flex-grow flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-b from-[#FFAFBD] to-background dark:bg-gray-900">
        <div
            class="p-[100px_100px] w-[35vw] mx-auto bg-white rounded-3xl shadow-xl shadow-gray/25 text-black/50 dark:bg-black dark:text-white/50">
            <div class="ml-6 mb-6 w-[320px]">
                <a href="/" wire:navigate>
                    <img src="{{ asset('images/logo.png') }}" alt="Logo TagIT">
                </a>
            </div>
            {{ $slot }}
        </div>
    </div>


    <footer class="py-16 bg-[#FFD5D5] text-left">
        <p class="mx-[40px] text-primary dark:text-blue">Copyright @ 2024 TagIT. All rights reserved</p>
    </footer>

</body>


</html>
