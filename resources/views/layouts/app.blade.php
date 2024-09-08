<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ConnectHive') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    
    <!-- Scripts -->
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="{{ asset('build/assets/app-pGqqLXLo.css') }}">
    <script src="{{ asset('build/assets/app-Cs0QkU1O.js') }}"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body class="font-sans antialiased">
    {{-- <div class="min-h-screen bg-gray-100 dark:bg-gray-900"> --}}

    {{-- @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset --}}

    <!-- Page Content -->

    {{-- <main> --}}
    {{-- @include('layouts.sidebar') --}}


    @session('message')
        <div class="success-message" style="z-index: 99999;">
            {{ session('message') }}
        </div>
    @endsession

    <div>

        {{ $slot }}

    </div>


    <script>
        function formatDate(date) {
            return new Intl.DateTimeFormat('en-GB', {
                day: '2-digit',
                month: 'short',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            }).format(date).replace(',', '');
        }
    </script>

    {{-- </main> --}}

</body>

</html>
