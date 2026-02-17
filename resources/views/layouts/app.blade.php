<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PDT-STIS') }}</title>

        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Icons -->
        <link rel="shortcut icon" type="image/png" href="{{asset ('/assets/img/logo pdt.png') }}" />
        
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('/css/styles.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('/css/custom.css') }}"/>
        <link rel="stylesheet" href="{{ asset('/admin/assets/css/form.css') }}">
        <link rel="stylesheet" href="{{ asset('/admin/assets/css/styles.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('/admin/assets/css/custom.css') }}" />
        
        {{-- trix editor --}}
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Z1mZlkCJg2ES+8FQECacuLpLHPeqZ3f+waFaG5BvBBcA5q5kDYWvXLjogp2fep5G" crossorigin="anonymous">

        <style>
            trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            @include('components.dashboard.sidebar')
            @include('layouts.navigation')
            <!-- Page Content -->
            <main>
                @if (isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </main>
        </div>

        <!-- JS -->
        <script src="{{asset ('/libs/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{asset ('/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{asset ('/js/sidebarmenu.js') }}"></script>
        <script src="{{asset ('/js/app.min.js') }}"></script>
        <script src="{{asset ('/libs/simplebar/dist/simplebar.js') }}"></script>
        <script src="{{asset ('/admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{asset ('/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{asset ('/admin/assets/js/sidebarmenu.js') }}"></script>
        <script src="{{asset ('/admin/assets/js/app.min.js') }}"></script>
        <script src="{{asset ('/admin/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    </body>
</html>
