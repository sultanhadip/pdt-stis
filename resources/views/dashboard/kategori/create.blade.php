<x-app-layout>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
<div class="body-wrapper">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Tambah Kategori</h1>
</div> --}}

<div class="col-lg-8 mb-5">
    <!-- Formulir untuk menambah kategori -->
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
{{-- <script>
    const nameInput = document.querySelector('#name');
    const slugInput = document.querySelector('#slug');

    nameInput.addEventListener('change', function() {
        fetch('/dashboard/kategori/checkSlug?name=' + nameInput.value)
            .then(response => response.json())
            .then(data => slugInput.value = data.slug)
    });
</script> --}}
</x-app-layout>