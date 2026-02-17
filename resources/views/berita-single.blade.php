<x-index>
@section('blog')
    <!-- ======= Breadcrumbs ======= -->
    @section('breadcrumbs')
      <li><a href="/home">Home</a></li>
      <li><a href="/berita">Berita</a></li>
      <li>{{ $title }}</li>
    @endsection

{{-- Main section --}}
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-8 entries">
          <article class="entry entry-single">
            
            {{-- Menampilkan foto/ thumbnails --}}
            <div class="entry-img">
              @if($berita->image)
                <img src="{{ asset('storage/' . $berita->image) }}" alt="" class="img-fluid" style="width: 1000px; object-fit: cover;">
              @else
                <img src="https://source.unsplash.com/1000x600?{{ $berita->category->name }}" alt="" class="img-fluid">
              @endif
            </div>
           
            {{-- Menampilkan judul berita --}}
            <h2 class="entry-title">
              {{ $berita->title }}
            </h2>
           
            {{-- Menampilkan nama penulis dan waktu publish berita --}}
            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center text-dark"><i class="bi bi-person"></i>{{ $berita->author }}</li>
                <li class="d-flex align-items-center text-dark"><i class="bi bi-clock"></i><time datetime="2020-01-01">{{ $berita->created_at->diffForHumans() }}</time></li>
                <li class="d-flex align-items-center text-dark"><i class="bi bi-clock"></i><time datetime="2020-01-01">{{ $berita->category->name }}</time></li>
              </ul>
            </div>
           
            {{-- Menampilkan isi --}}
            <div class="entry-content">
                {!! $berita->body !!}
            </div>
  
          </article><!-- End blog entry -->
        </div>
        
        {{-- Menampilkan sidebar --}}
        <div class="col-lg-4">
          @include('layouts.sidebar')
        </div><!-- End blog sidebar -->
      
      </div>
    </div>
</section>
</x-index>