<x-app-layout>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="body-wrapper">
      <!-- ======= Breadcrumbs ======= -->
      <div class="ms-5 mt-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Testimoni & Feedback</li>
          </ol>
        </nav>
      </div><!--End Breadcumb-->

      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="card-title fw-semibold">Tabel Testimoni dan Feedback</h5>
              <div class="d-flex align-items-center">
                <div class="dropdown me-3">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="sortingDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Urut dari yang terbaru
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="sortingDropdown">
                    <li><a class="dropdown-item" href="#">Urut dari yang terbaru</a></li>
                    <li><a class="dropdown-item" href="#">Urut dari yang terlama</a></li>
                  </ul>
                </div>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Cari tahun pendaftaran" aria-label="Search" aria-describedby="searchButton">
                  <button class="btn btn-primary" type="button" id="searchButton">Cari</button>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="table-responsive">
                <table class="table text-wrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">User ID</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Testimoni</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Feedback</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Action</h6>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($feedback as $f)
                    <tr>
                      <td class="border-bottom-0">{{ $f->id_user}}</td>
                      <td class="border-bottom-0">{{ $f->testimoni}}</td>
                      <td class="border-bottom-0">{{ $f->feedback}}</td>
                      <td class="border-bottom-0">
                        <form method="post" action="{{ route('feedback.editview', ['id' => $f->id]) }}">
                          @csrf
                          @method('POST') {{-- Tambahkan method POST agar rute dapat menangkap aksi POST --}}

                          <?php
                          // Teks untuk tombol
                          $buttonText = ($f->status == 1) ? 'Hide' : 'Show';
                          $newStatus = ($f->status == 1) ? 0 : 1;
                          ?>

                          <input type="hidden" name="status" value="{{ $newStatus }}">

                          <button type="submit" name="tampilkan" class="btn btn-{{ $f->status == 1 ? 'danger' : 'success' }}" onclick="return confirm('Apakah Anda yakin ingin menampilkan testimoni ini?')">
                            {{ $buttonText }}
                          </button>
                        </form>

                      <td class="border-bottom-0">
                        <form id="hapusTestimoniForm" method="post" action="{{ route('feedback.hapusTestimoni', ['id' => $f->id]) }}">
                          @csrf
                          <input type="hidden" name="status" value="{{ $f->status }}">
                          <button type="submit" name="tampilkan" class="btn btn-primary mr-2" id="tampilkanButton" onclick="return confirm('Apakah Anda ingin menghapus testimoni ini?')">Hapus</button>
                        </form>
                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        {{ $feedback->links() }}
      </div>
    </div>
  </div>
</x-app-layout>