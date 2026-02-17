<x-app-layout>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
<div class="body-wrapper">
  <div class="ms-5 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Berita</li>
        </ol>
    </nav>
</div>
<!--End Breadcumb-->
{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Berita</h1>
</div> --}}

{{-- Tombol tambah berita dan kategori --}}
{{-- <div class="mb-3">
  <a href="/dashboard/berita/create" class="btn btn-primary">
      <span data-feather="plus-circle"></span> Tambah Berita
  </a>
  <a href="/dashboard/kategori" class="btn btn-primary">
      <span data-feather="list"></span> Kategori
  </a>
</div> --}}

{{-- Tabel berita --}}
{{-- <div class="table-responsive">
  <table class="table table-hover table-striped">
      <thead class="table-dark">
      <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach($berita as $beritaTable)
      <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $beritaTable->title }}</td>
          <td>{{ $beritaTable->category->name }}</td>
          <td>
              <a href="/dashboard/berita/{{ $beritaTable->slug }}" class="btn btn-info">
                  <span data-feather="eye"></span> Show
              </a>
              <a href="/dashboard/berita/{{ $beritaTable->slug }}/edit" class="btn btn-warning">
                  <span data-feather="edit"></span> Edit
              </a>
              <form action="/dashboard/berita/{{ $beritaTable->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Apakah Anda ingin menghapus berita ini?')">
                      <span data-feather="trash-2"></span> Delete
                  </button>
              </form>
          </td>
      </tr>
      @endforeach
      </tbody>
  </table>
</div> --}}

     {{-- Tabel berita --}}
     {{-- <div class="table-responsive">
        <a href="/dashboard/berita/create" class="btn btn-primary mb-3">Tambah Berita</a>
        <a href="/dashboard/kategori" class="btn btn-primary mb-3">Kategori</a>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <td scope="col">#</td>
            <td scope="col">Judul</td>
            <td scope="col">Kategori</td>
            <td scope="col">Action</td>
          </tr>
        </thead>
        <tbody>
          @foreach($berita as $beritaTable) 
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <th>{{ $beritaTable->title }}</th>
            <th>{{ $beritaTable->category->name }}</th>
            <th>
              <a href="/dashboard/berita/{{ $beritaTable->slug }}" class="badge bg-info"><span data-feather="eye">show</span></a>
              <a href="/dashboard/berita/{{ $beritaTable->slug }}/edit" class="badge bg-warning"><span data-feather="eye">edit</span></a>
              <form action="/dashboard/berita/{{ $beritaTable->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda ingin menghapus berita ini?')">
                    <span data-feather="eye">delete</span>
                </button>
              </form>
            </th>
          </tr>
          @endforeach
        </tbody>
      </table>
     </div> --}}


{{-- Tabel berita --}}
{{-- <div class="table-responsive">
  <a href="/dashboard/berita/create" class="btn btn-primary mb-3">Tambah Berita</a>
  <a href="/dashboard/kategori" class="btn btn-primary mb-3">Kategori</a>
  <table class="table table-hover table-striped">
      <thead class="table-dark">
      <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach($berita as $beritaTable)
      <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $beritaTable->title }}</td>
          <td>{{ $beritaTable->category->name }}</td>
          <td>
              <a href="/dashboard/berita/{{ $beritaTable->slug }}" class="badge bg-info"><span data-feather="eye">show</span></a>
              <a href="/dashboard/berita/{{ $beritaTable->slug }}/edit" class="badge bg-warning"><span data-feather="eye">edit</span></a>
              <form action="/dashboard/berita/{{ $beritaTable->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda ingin menghapus berita ini?')">
                      <span data-feather="eye">delete</span>
                  </button>
              </form>
          </td>
      </tr>
      @endforeach
      </tbody>
  </table>
</div> --}}

<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="card-title fw-semibold">Tabel Daftar Berita</h5>
              <div class="d-flex align-items-center">
                <div class="dropdown me-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="sortingDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $activeCategory ? $activeCategory->name : 'Semua Kategori' }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortingDropdown">
                        <li>
                            <a href="/dashboard/berita" class="dropdown-item {{ !$activeCategory ? 'active' : '' }}">Semua Kategori</a>
                        </li>
                        @foreach ($categories as $kategori)
                            <li>
                                <a href="/dashboard/berita?category={{ $kategori->slug }}" class="dropdown-item {{ $activeCategory && $activeCategory->slug == $kategori->slug ? 'active' : '' }}">
                                    {{ $kategori->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                  {{-- <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search.." aria-label="Search" aria-describedby="searchButton">
                      <button class="btn btn-primary" type="button" id="searchButton">Cari</button>
                  </div> --}}
                  {{-- Search --}}
                  <div class="input-group">
                    <form action="/dashboard/berita" class="input-group d-flex">
                      @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                      @endif
                      <input type="text" class="form-control" name="search" placeholder="Search.." aria-label="Search" aria-describedby="searchButton">
                      <button class="btn btn-primary" type="submit" id="searchButton">Cari</button>
                    </form>
                  </div><!-- End search form -->                
              </div>
          </div>

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
            <a href="/dashboard/berita/create" class="btn btn-primary">
                <span data-feather="plus-circle"></span> Tambah
            </a>
            <a href="/dashboard/kategori" class="btn btn-primary">
                <span data-feather="list"></span> Kategori
            </a>
        </div>
        
        <!-- Display message when there are no news articles -->
        @if($berita->isEmpty())
          <div class="alert alert-info" role="alert">
              Tidak ada berita yang tersedia.
          </div>
        @else
        
        <div class="card">
          <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">#</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Judul</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Kategori</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Aksi</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($berita as $beritaTable)
                  <tr>
                      <td class="border-bottom-0">{{ $loop->iteration }}</td>
                      <td>{{ $beritaTable->title }}</td>
                      <td>{{ $beritaTable->category->name }}</td>
                      <td>
                          <a href="/dashboard/berita/{{ $beritaTable->slug }}" class="badge bg-info p-1"><span data-feather="eye">show</span></a>
                          <a href="/dashboard/berita/{{ $beritaTable->slug }}/edit" class="badge bg-warning p-1"><span data-feather="edit">edit</span></a>
                          <form action="/dashboard/berita/{{ $beritaTable->slug }}" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="badge bg-danger border-0 p-1" style="vertical-align: top;" onclick="return confirm('Apakah Anda ingin menghapus berita ini?')">
                                  <span data-feather="trash-2">delete</span>
                              </button>
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

     {{-- Menampilkan link untuk halaman berita utama selanjutnya --}}
  <div class="d-flex justify-content-center">
    {{ $berita->links() }}
  </div>
</div>
</div>
  @endif
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script>
  feather.replace();
</script>
</x-app-layout>