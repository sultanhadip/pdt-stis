@extends('layouts.admin')

@section('content')
    
@endsection
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post" action="upload.php">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                            <div class="mb-3">
                                <label for="jenisPemasukan" class="form-label">Jenis Pemasukan</label>
                                <input type="text" class="form-control" id="jenisPemasukan" name="jenisPemasukan">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsiPemasukan" class="form-label">Deskripsi Pemasukan</label>
                                <input type="text" class="form-control" id="deskripsiPemasukan" name="deskripsiPemasukan">
                            </div>
                            <div class="mb-3">
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

@endsection