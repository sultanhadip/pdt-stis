<x-app-layout>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="body-wrapper">
        <div class="ms-5 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/galeri">Galeri</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tampilkan Galeri</li>
                </ol>
            </nav>
        </div>
        <!--End Breadcumb-->
    <div class="container-fluid">
    <!-- <section class="foto-section"> -->
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">
                    <article class="entry entry-single">

                        <!-- {{-- Menampilkan judul foto --}} -->
                        <h2 class="entry-title">
                            <a>{{ $gallery->title }}</a>
                        </h2>

                        <!-- {{-- Menampilkan tombol kembali, edit, dan delete --}} -->
                        <div class="mb-3">
                            <a href="/dashboard/galeri" class="btn btn-success p-1"><span data-feather="arrow-left"></span> Kembali</a>
                            <a href="/dashboard/galeri/{{ $gallery->id }}/edit" class="btn btn-warning p-1"><span data-feather="edit"></span> Edit</a>
                            <form action="/dashboard/galeri/{{ $gallery->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger p-1" onclick="return confirm('Apakah Anda ingin menghapus foto ini?')">
                                    <span data-feather="trash-2"></span> Hapus
                                </button>
                            </form>
                        </div>

                        <!-- {{-- Menampilkan foto --}} -->
                        <div class="entry-img mb-3">
                            <img src="{{ asset('/storage/posts/'.$gallery->filename) }}" alt="" class="img-fluid">
                        </div>

                        <!-- {{-- Menampilkan title, deskripsi, dan tahun foto --}} -->
                        <div class="entry-meta mb-3">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="bi bi-person"></i>{{ $gallery->title }}</a></li>
                                <li class="list-inline-item"><i class="bi bi-clock"></i>{{ $gallery->caption }}</time></a></li>
                                <li class="list-inline-item"><i class="bi bi-clock"></i>{{ $gallery->tahun }}</li>
                            </ul>
                        </div>

                    </article>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
    <!-- </section> -->
</x-app-layout>