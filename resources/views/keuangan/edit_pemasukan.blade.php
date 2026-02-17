<x-app-layout>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
        <div class="body-wrapper">
            <div class="container mt-5">
                <div class="container-fluid">
                    <div class="container-fluid">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <form enctype="multipart/form-data" method="post"
                                        action="{{ route('pemasukan.update', $pemasukan->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                value="{{ $pemasukan->tanggal_pemasukan }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jenisPemasukan" class="form-label">Jenis Pemasukan</label>
                                            <input type="text" class="form-control" id="jenisPemasukan" name="jenisPemasukan"
                                                value="Pemasukan">
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsiPemasukan" class="form-label">Deskripsi Pemasukan</label>
                                            <input type="text" class="form-control" id="deskripsiPemasukan" name="deskripsiPemasukan"
                                                value="{{ $pemasukan->ket_pendanaan }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nominal" class="form-label">Nominal</label>
                                            <input type="text" class="form-control" id="nominal" name="nominal"
                                                value="{{ $pemasukan->total }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



