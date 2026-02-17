<x-app-layout>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
<div class="body-wrapper">
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="card-title fw-semibold">Tabel Daftar Berita</h5>
              <div class="d-flex align-items-center">
                  <!-- <div class="dropdown me-3">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="sortingDropdown"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Urut dari yang terbaru
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="sortingDropdown">
                          <li><a class="dropdown-item" href="#">Urut dari yang terbaru</a></li>
                          <li><a class="dropdown-item" href="#">Urut dari yang terlama</a></li>
                      </ul>
                  </div>
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search.." aria-label="Search" aria-describedby="searchButton">
                      <button class="btn btn-primary" type="button" id="searchButton">Cari</button>
                  </div> -->
              </div>
          </div>

          {{-- Notifikasi ketika kategori berhasil di tambahkan/ di update/ di delete --}}
          @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
          @endif
          @if(session()->has('error'))
          <div class="alert alert-warning" role="alert">
            {{ session('error') }}
          </div>
          @endif
          <div class="mb-3">
            <a href="/dashboard/berita" class="btn btn-success mb-3"><span data-feather="arrow-left"></span>Kembali</a>
            {{-- <a href="/dashboard/kategori/create" class="btn btn-primary mb-3">Tambah Kategori</a> --}}
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                Tambah Kategori
            </button>

            <!-- Modal Pop-up untuk Tambah Kategori -->
            <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="addCategoryModalLabel">Tambah Kategori Baru</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <!-- Form untuk menambah kategori -->
                          <form action="/dashboard/kategori" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus>
                                <input type="hidden" class="form-control" id="slug" name="slug">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
          
        </div>
        
        <div class="card">
          <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">#</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Nama Kategori</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Aksi</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  {{-- menampilkan semua kategori --}}
          @foreach($categories as $kategori) 
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <th>{{ $kategori->name }}</th>
            <th>
                {{-- hapus kategori --}}
              <form action="/dashboard/kategori/{{ $kategori->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda ingin menghapus kategori ini?')">
                    <span data-feather="trash-2">delete</span>
                </button>
              </form>
            </th>
          </tr>
          @endforeach
                                           
                </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
      fetch('/dashboard/kategori/checkSlug?name=' + name.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
  });
</script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script>
  feather.replace();
</script>
</x-app-layout>