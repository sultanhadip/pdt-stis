<x-app-layout>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="body-wrapper">
      <div class="ms-5 mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Keuangan</li>
            </ol>
        </nav>
    </div>
    <!--End Breadcumb-->
    <div class="container mt-5">
        @if (session('success'))
            <!-- Success alert code here -->
        @endif
        <livewire:keuangan-table/>
    </div>
    </div>
  </div>
</x-app-layout>