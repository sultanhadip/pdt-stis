<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
<x-app-layout>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" style="padding-bottom: 100px;">
    <div class="body-wrapper">
        <div class="ms-5 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/berita">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tampilkan Berita</li>
                </ol>
            </nav>
        </div>
        <!--End Breadcumb-->
    <div class="container mt-5">
        
        <!-- start code -->
        <section class="blog-section">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 entries" style="margin-right: 240px;">
                        <article class="entry entry-single">
    
                            {{-- Menampilkan judul berita --}}
                            <h2 class="entry-title">
                                <a href="blog-single.html">{{ $berita->title }}</a>
                            </h2>
    
                            {{-- Menampilkan tombol kembali, edit, dan delete --}}
                            <div class="mb-3">
                                <a href="/dashboard/berita" class="btn btn-success p-1 btn-sm"><span data-feather="arrow-left"></span> </a>
                                <a href="/dashboard/berita/{{ $berita->slug }}/edit" class="btn btn-warning p-1 btn-sm"><span data-feather="edit"></span> </a>
                                <form action="/dashboard/berita/{{ $berita->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger p-1 btn-sm" onclick="return confirm('Apakah Anda ingin menghapus berita ini?')">
                                        <span data-feather="trash-2"></span> 
                                    </button>
                                </form>
                            </div>
    
                            {{-- Menampilkan foto/thumbnails --}}
                            <div class="entry-img mb-3">
                                @if($berita->image)
                                    <img src="{{ asset('storage/' . $berita->image) }}" alt="" class="img-fluid">
                                @else
                                    <img src="https://source.unsplash.com/1000x600?{{ $berita->category->name }}" alt="" class="img-fluid">
                                @endif
                            </div>
    
{{-- Menampilkan nama penulis, waktu publish, dan kategori berita --}}
<div class="entry-meta mb-3">
    <dl class="row col-6">
        <dt class="col-sm-2 text-dark fw-bold">Penulis</dt>
        <dd class="col-sm-9 text-dark">: {{ $berita->author }}</dd>

        <dt class="col-sm-2 text-dark fw-bold">Waktu</dt>
        <dd class="col-sm-9 text-dark"><time datetime="2020-01-01">: {{ $berita->created_at->format('l') }}</time></dd>

        <dt class="col-sm-2 text-dark fw-bold">Kategori</dt>
        <dd class="col-sm-9 text-dark">: {{ $berita->category->name }}</dd>
    </dl>
</div>


    
                            {{-- Menampilkan isi berita --}}
                            <div class="entry-content">
                                {!! $berita->body !!}
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <!-- end code -->
    </div>
    </div>
</div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script>
    feather.replace();
</script>
