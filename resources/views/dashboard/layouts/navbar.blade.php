<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('/admin/assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('/admin/assets/css/styles.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/admin/assets/css/custom.css') }}"/>

  {{-- Feather icon --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

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

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    
<!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../admin/assets/images/logos/dark-logo.svg" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu"></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-keuangan.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-moneybag"></i>
                  </span>
                  <span class="hide-menu">Keuangan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-volunteer.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-users"></i>
                  </span>
                  <span class="hide-menu">Volunteer</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-donasi.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-wallet"></i>
                  </span>
                  <span class="hide-menu">Donasi</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-galeri.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-photo"></i>
                  </span>
                  <span class="hide-menu">Galeri</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-publikasi.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-news"></i>
                  </span>
                  <span class="hide-menu">Berita</span>
                </a>
              </li> 
          </ul>
        </nav>
  
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
<!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      
      <!--  Header End -->
    @yield('berita')
    
    </div>
  {{-- <script src="{{ asset('/admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/admin/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('/admin/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('/admin/assets/libs/simplebar/dist/simplebar.js') }}"></script> --}}
  {{-- Script transform --}}
  <script src="{{ asset('/admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/admin/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('/admin/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('/admin/assets/libs/simplebar/dist/simplebar.js') }}"></script>
</body>

</html>