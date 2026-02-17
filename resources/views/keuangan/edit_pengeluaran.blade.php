<x-app-layout>
      <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="body-wrapper">
    <div class="container mt-5">
    <div class="container-fluid">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post" action="{{ route('pengeluaran.update', $pengeluaran->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $pengeluaran->tanggal_pengeluaran }}">
                            </div>
                            <div class="mb-3">
                                <label for="jenisPengeluaran" class="form-label">Jenis Pengeluaran</label>
                                <input type="text" class="form-control" id="jenisPengeluaran" name="jenisPengeluaran" value="Pengeluaran">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsiPengeluaran" class="form-label">Deskripsi Pengeluaran</label>
                                <input type="text" class="form-control" id="deskripsiPengeluaran" name="deskripsiPengeluaran" value="{{ $pengeluaran->ket_pendanaan }}">
                            </div>
                            <div class="mb-3">
                                <label for="nominal" class="form-label">Nominal</label>
                                <input type="text" class="form-control" id="nominal" name="nominal" value="{{ $pengeluaran->total }}">
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
</x-app-layout>