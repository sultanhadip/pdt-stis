<div class="sidebar">

    {{-- Search --}}
    <h3 class="sidebar-title">Search</h3>
    <div class="sidebar-item search-form">
      <form action="/berita">
        @if(request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        <input type="text" class="form-control" name="search" placeholder="Search..">
        <button type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End sidebar search formn-->

    <h3 class="sidebar-title">Categories</h3>
    <div class="sidebar-item categories">
      @foreach ($categories as $kategori)
        <ul>
            <li>
              <a href="/berita?category={{ $kategori->slug }}" class="{{ $activeCategory && $activeCategory->slug == $kategori->slug ? 'active' : '' }}">
                {{ $kategori->name }}<span>(jml)</span>
              </a>
            </li>
        </ul>
      @endforeach
    </div><!-- End sidebar categories-->

    <h3 class="sidebar-title">Recent Posts</h3>
    <div class="sidebar-item recent-posts">
      
      {{-- Recent post --}}
      @foreach($recentPost as $beritaTerbaru)
      <div class="post-item clearfix">
        <div class="entry-img">
          @if($beritaTerbaru->image)
            <img src="{{ asset('storage/' . $beritaTerbaru->image) }}" alt="" class="img-fluid">
          @else
          <img src="https://source.unsplash.com/1000x600?{{ $beritaTerbaru->category->name }}" alt="" class="img-fluid">
          @endif
        </div>
        <h4><a href="/berita/{{ $beritaTerbaru->slug }}">{{ $beritaTerbaru->title }}</a></h4>
        <time datetime="2020-01-01">{{ $beritaTerbaru->created_at->diffForHumans() }}</time>
      </div>
      @endforeach

    </div><!-- End sidebar recent posts-->
  </div><!-- End sidebar -->