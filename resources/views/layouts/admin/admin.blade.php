<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDT STIS</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/admin/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.min.css') }}" />
    @livewireStyles
</head>

<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('partials.sidebar') <!-- Create a partial for the sidebar -->

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <!-- Header Start -->
            {{-- @include('partials.header') <!-- Create a partial for the header --> --}}

            <!-- Header End -->
            <main class="py-4">
                <div class="container">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/simplebar/dist/simplebar.js') }}"></script>
    @livewireScripts
    @livewireScripts
    <script>
        window.livewire.on('donationTableRefresh', () => {
            Livewire.emit('refreshLivewire');
        });
    </script>
</body>

</html>