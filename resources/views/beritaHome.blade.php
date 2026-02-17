@foreach($recentPost as $beritaTerbaru)
          <div class="col-lg-4">
            <div class="post-box">
                <div class="post-img">
                    @if($beritaTerbaru->image)
                        <img src="{{ asset('storage/' . $beritaTerbaru->image) }}" alt="" class="img-fluid">
                    @else
                        <img src="https://source.unsplash.com/1000x600?{{ $beritaTerbaru->category->name }}" alt="" class="img-fluid">
                    @endif
                </div>
              <span class="post-date"><time datetime="2020-01-01">{{ $beritaTerbaru->created_at->diffForHumans() }}</time></span>
              <h3 class="post-title">{{ $beritaTerbaru->title }}</h3>
              <p>{{ $beritaTerbaru->excerpt }}</p>
              <a href="/berita/{{ $beritaTerbaru->slug }}"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        @endforeach