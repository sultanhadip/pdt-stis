<x-app-layout>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="body-wrapper">

            <!--Breadcumb-->
            <div class="ms-5 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Events</li>
                    </ol>
                </nav>
            </div>
            <!--End Breadcumb-->
            <div class="container-sm">

                @if (session('success'))
                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <script>
                    setTimeout(function() {
                        document.getElementById('success-alert').style.display = 'none';
                    }, 5000);
                </script>
                @endif

                <h1 style="text-align: center">Events PDT</h1>



                <!-- Informations -->
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Rincian</h4>
                    <hr>
                    <ul>
                        <li>Judul Event merupakan judul dari kegiatan yang pdt yang diadakan tahun ini</li>
                        <li>Deskripsi memuat keterangan atau logan dari kegiatan PDT</li>
                        <li>Kuota Volunteer merupakan kuota yang tersedia untuk oprec PDT</li>
                        <li>Lokasi PDT tempat berlangsungnya kegiatan PDT</li>
                        <li>Tanggal dimulai menerangkan waktu dimulai kegiatan PDT</li>
                        <li>Tanggal berakhir menerangkan waktu terakhir kegiatan PDT berlangsung</li>
                    </ul>
                </div>
                <!-- End Informations-->

                <!-- Table Events Content-->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            @if (count($events) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Judul Event</th>
                                        <th>Deskripsi Event</th>
                                        <th>Kuota Volunteer</th>
                                        <th>Lokasi PDT</th>
                                        <th>Tanggal dimulai</th>
                                        <th>Tanggal berakhir</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->description }}</td>
                                        <td>{{ $event->quota }}</td>
                                        <td>{{ $event->lokasi }}</td>
                                        <td>{{ $event->waktu_mulai}}</td>
                                        <td>{{ $event->waktu_akhir}}</td>
                                        <td>
                                            {{-- <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a> --}}
                                            <form action="{{ route('events.hapusKegiatan', $event->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <p>Tidak ada kegiatan.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <a href="{{ route('events.createKegiatan') }}">
                        <button class="btn btn-primary rounded-circle" style="width: 40px; height: 40px; font-size: 18px; line-height: 1; text-align: center ">+</button>
                    </a>
                </div>
            </div>

            <!-- End Table Events Content-->

        </div>
    </div>
</x-app-layout>