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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        <script>
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- sidebar -->
                <div class="col-md-1" id="sidebar_pc">
                    @include('layouts.navigation')
                </div>
                <!-- Main Content -->
                <main class="col-md-11 m-0 py-0 px-2">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>