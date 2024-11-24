<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans flex flex-col h-screen bg-background">
    <header class="grid items-center gap-2 py-5 shadow-md">
        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif
    </header>

    <div class="flex-grow flex flex-col items-center justify-center mx-auto w-[50%]">
        <div class="flex mb-8 w-[35%]">
            <x-application-logo></x-application-logo>
        </div>
        <div class="flex mb-10">
            <p class="text-center text-primary text-2xl font-thin">Whether you're looking to attend an event, network
                with peers, or participate in development programs, TagIT brings everything together in one place to
                make campus life more enriching.</p>
        </div>
    </div>

    <footer class="py-16 bg-[#FFD5D5] text-left">
        <p class="mx-[40px] text-gray-800 dark:text-blue">Copyright @ 2024 TagIT. All rights reserved</p>
    </footer>
</body>

</html>
