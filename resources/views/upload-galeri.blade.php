<x-app-layout>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="body-wrapper">
      <div class="container-fluid">
        <div class="container-fluid">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="card">
                        <div class="card-body">
                            <form enctype="multipart/form-data" method="post" action="{{ url('/admin/upload-galeri') }}">
                            @csrf 
                                <div class="mb-3">
                                    <label for="filename" class="form-label">Upload Foto</label>
                                    <input type="file" class="form-control @error('filename') is-invalid @enderror" id="filename" name="filename[]" accept="image/*" multiple>
                                    @error('filename')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title Foto</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                                    @error('title')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="caption" class="form-label">Deskripsi Foto</label>
                                    <textarea class="form-control @error('caption') is-invalid @enderror" id="caption" name="caption" rows="3"></textarea>
                                    @error('caption')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                  </div>

                                  <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun Foto</label>
                                    <select class="form-select" id="tahun" name="tahun">
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
                                <!-- <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun Foto</label>
                                    <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun">
                                    @error('tahun')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div> -->
                                <button type="submit" class="btn btn-primary">Submit</button>
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