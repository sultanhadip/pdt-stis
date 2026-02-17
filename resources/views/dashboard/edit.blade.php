<x-app-layout>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="body-wrapper">
        <div class="ms-5 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/galeri">Galeri</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Galeri</li>
                </ol>
            </nav>
        </div>
        <!--End Breadcumb-->
    <div class="container-fluid">
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                              <h1>Edit Foto</h1>
                          </div>

                          <div class="col-lg-8 mb-5">
                          <form  enctype="multipart/form-data" method="post" action="/dashboard/galeri/{{ $gallery->id }}" enctype="multipart/form-data">
                              @method('put')
                              @csrf
                              <div class="mb-3">
                                  <label for="filename" class="form-label"> Foto</label>
                                  <input type="hidden" name="oldFilename" value="{{ $gallery->filename }}">
                                  @if($gallery->filename)
                                  <img src="{{ asset('/storage/posts/'.$gallery->filename) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                  @else
                                      <img class="img-preview img-fluid mb-3 col-sm-5">
                                  @endif
                                  <input class="form-control @error('filename') is-invalid @enderror" type="file" id="filename" name="filename" onchange="previewImage()">
                                  @error('filename')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              <div class="mb-3">
                              <label for="title" class="form-label">Judul</label>
                              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $gallery->title) }}">
                                  @error('title')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              
                              <div class="mb-3">
                                  <label for="caption" class="form-label">Deskripsi</label>
                                  <input type="text" class="form-control @error('caption') is-invalid @enderror" id="caption" name="caption" required autofocus value="{{ old('caption', $gallery->caption) }}">
                                  @error('caption')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              
                              <div class="mb-3">
                              <label for="tahun" class="form-label">Tahun Foto</label>
                              <select class="form-select @error('tahun') is-invalid @enderror" id="tahun" name="tahun" required autofocus value="{{ old('tahun', $gallery->tahun) }}">
                              <?php
                                $currentYear = date("Y");
                                  for ($tahun = 2019; $tahun <= 2025; $tahun++) {
                                    echo "<option value=\"$tahun\">$tahun</option>";
                                  }
                              ?>
                              </select>
                                @error('tahun')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>                                      
                              
                              <button type="submit" class="btn btn-primary">Update</button>
                          </form>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
    <script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
  </script>
</x-app-layout>