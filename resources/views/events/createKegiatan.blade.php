<x-app-layout>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="body-wrapper">
            <!--Breadcumb-->
            <div class="ms-5 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/events">Events</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
            <!--End Breadcumb-->
            <div class="text-center">
                <h2>Buat Kegiatan PDT</h2>
            </div>

            <div class="container-sm">
                <!-- Table Events -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <p class="mb-0 text-right">
                    <span class="text-danger" id="i4" aria-label="Required question">*</span>
                    <span class="ml-2 text-danger">Wajib diisi</span>
                </p>

                <form action="{{ route('events.store') }}" method="post">
                    @csrf

                    <div class="form-group p-2">
                        <label for="title" class="form-label">
                            Judul Kegiatan:
                            <span class="text-danger vnumgf" id="i4" aria-label="Required question">*</span>
                        </label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="form-group p-2">
                        <label for="description" class="form-label">
                            Deskripsi Kegiatan:
                            <span class="text-danger vnumgf" id="i4" aria-label="Required question">*</span>
                        </label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group p-2">
                        <label for="quota" class="form-label">
                            Kuota Volunteer:
                            <span class="text-danger vnumgf" id="i4" aria-label="Required question">*</span>
                        </label>
                        <input type="number" name="quota" id="quota" class="form-control">
                    </div>

                    <div class="form-group p-2">
                        <label for="lokasi" class="form-label">
                            Metode
                            <span class="text-danger vnumgf" id="i4" aria-label="Required question">*</span>
                        </label>
                        <select class="form-select" name="lokasi" id="lokasi" required>
                            <option value="Daring">Daring</option>
                            <option value="Luring">Luring</option>
                        </select>
                    </div>

                    <div class="form-group p-2">
                        <label for="waktu_mulai" class="form-label">
                            Waktu Mulai:
                            <span class="text-danger vnumgf" id="i4" aria-label="Required question">*</span>
                        </label>
                        <input type="date" name="waktu_mulai" id="waktu_mulai" class="form-control" required>
                    </div>

                    <div class="form-group p-2">
                        <label for="waktu_akhir" class="form-label">
                            Waktu Akhir:
                            <span class="text-danger vnumgf" id="i4" aria-label="Required question">*</span>
                        </label>
                        <input type="date" name="waktu_akhir" id="waktu_akhir" class="form-control" required>
                    </div>
                    <br>
                    <div class="form-group text-right p-2">
                        <button type="submit" class="btn btn-primary">Create Event</button>
                    </div>
                </form>
                <!--End Table Events -->
            </div>
        </div>
    </div>
    </div>
</x-app-layout>