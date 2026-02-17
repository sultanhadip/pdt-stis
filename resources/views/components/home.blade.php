<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PDT-STIS') }}</title>
        <link href="{{ asset('assets/img/logo pdt.png') }}" rel="icon">
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">
            
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/welcome_style.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/main.css')}}" rel="stylesheet" media="all">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @notifyCss
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            @include('components.home.header')
            
            <!-- Page Content -->
            <main id="main">
                <section class="bg-white">
                    <div class="container">
                        {{ $slot }}
                    </div>
                </section>
            </main>
        </div>
        @include('components.home.footer')

        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
        
        <!-- Jquery JS-->
        <script src="{{ asset('/assets/halDarftarVolunteer/vendor/jquery/jquery.min.js') }}"></script>
        
        <!-- Template Main JS File -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('/assets/halDarftarVolunteer/js/global.js') }}"></script>
        @notifyJs
        @livewireScripts
        <script>
            window.livewire.on('donationTableRefresh', () => {
                Livewire.emit('refreshLivewire');
            });
        </script>
    </body>
</html>
