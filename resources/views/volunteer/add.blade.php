<x-app-layout>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="body-wrapper">
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Forms</h5>
              <div class="card">
                <div class="card-body">
                <form action="{{ route('volunteers.store') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">USER ID</label>
                            <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" placeholder="Masukkan User ID">
                        
                            <!-- error message untuk title -->
                            @error('user_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" placeholder="Masukkan NIM">
                        
                            <!-- error message untuk title -->
                            @error('nim')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">DEVISI</label>
                            <input type="text" class="form-control @error('devisi') is-invalid @enderror" name="devisi" value="{{ old('devisi') }}" placeholder="Masukkan Devisi">
                        
                            <!-- error message untuk title -->
                            @error('devisi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">No Wa</label>
                            <input type="text" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" value="{{ old('no_wa') }}" placeholder="Masukkan Nomor WA">
                        
                            <!-- error message untuk title -->
                            @error('no_wa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">CV</label>
                            <input type="file" class="form-control @error('link') is-invalid @enderror" name="link">
                        
                            <!-- error message untuk title -->
                            @error('link')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Status Pendaftaran</label>
                            <input type="text" class="form-control @error('status_pendaftaran') is-invalid @enderror" name="status_pendaftaran" value="{{ old('status_pendaftaran') }}" placeholder="Masukkan Status Pendaftaran">
                        
                            <!-- error message untuk title -->
                            @error('status_pendaftaran')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Created At</label>
                            <input type="date" class="form-control @error('created_at') is-invalid @enderror" name="created_at" value="{{ old('created_at') }}" placeholder="Masukkan Tanggal">
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
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