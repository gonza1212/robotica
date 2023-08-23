<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- sidebar -->
                <div class="col-md-1" id="sidebar_pc">
                    @include('layouts.navigation')
                </div>
                <!-- Main Content -->
                <main class="col-md-11">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>