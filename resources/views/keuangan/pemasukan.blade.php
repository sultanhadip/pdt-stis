<x-app-layout>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="body-wrapper">
        <!--Breadcumb-->
        <div class="ms-5 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/keuangan">Keuangan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pemasukan</li>
                </ol>
            </nav>
        </div>
        <!--End Breadcumb-->
    <div class="container-fluid">
        <div class="card-body d-flex justify-content-center align-items-center">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="card" style="width: 60vh">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post" action="{{ route('pemasukan.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                            <div class="mb-4">
                                <label for="jenisPemasukan" class="form-label">Jenis Pemasukan</label>
                                <input type="text" class="form-control" id="jenisPemasukan" name="jenisPemasukan">
                            </div>
                            <div class="mb-4">
                                <label for="deskripsiPemasukan" class="form-label">Deskripsi Pemasukan</label>
                                <input type="text" class="form-control" id="deskripsiPemasukan"
                                    name="deskripsiPemasukan">
                            </div>
                            <div class="mb-4">
                                <label for="nominal" class="form-label">Nominal</label>
                                <input type="text" class="form-control" id="nominal" name="nominal">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</x-app-layout>
