<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold">Tabel Donasi</h5>
                <div class="d-flex align-items-center">
                    <div class="dropdown me-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="sortingDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Urut dari yang {{ $sortDirection === 'asc' ? 'terlama' : 'terbaru' }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="sortingDropdown">
                            <li><a class="dropdown-item" wire:click="sortBy('created_at', 'terbaru')">Urut dari yang terbaru</a></li>
                            <li><a class="dropdown-item" wire:click="sortBy('created_at', 'terlama')">Urut dari yang terlama</a></li>
                        </ul>
                    </div>
                    <form action="{{ route('donations.viewDonasi') }}" method="GET" class="d-flex align-items-center">
                        <input wire:model="year" wire:input="performSearch" type="text" class="form-control" placeholder="Cari tahun donasi" aria-label="Search" aria-describedby="searchButton">
                        <button wire:click="performSearch" class="btn btn-primary" type="button" id="searchButton">Cari</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tanggal & Waktu</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Donatur</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Metode Pembayaran</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Bukti Pembayaran</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Jumlah Donasi</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Status</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Action</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donations as $donation)
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $donation->created_at->format('H:i:s | j F Y') }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $donation->nama }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $donation->metode }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal{{ $donation->id }}">
                                        View Image
                                    </button>
                                    <div class="modal fade" id="imageModal{{ $donation->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{ $donation->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel{{ $donation->id }}">Donation
                                                        Image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset($donation->link) }}" alt="Donation Image" style="max-width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $donation->nominal }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $donation->status }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <form action="{{ route('donations.updateStatus', $donation->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="btn-group mr-2" role="group" aria-label="Update Donation Status">
                                            @if ($donation->status === 'belum dikonfirmasi')
                                            <button type="submit" name="new_status" value="disetujui" class="btn btn-success mr-2">
                                                Setujui
                                            </button>
                                            <button type="submit" name="new_status" value="ditolak" class="btn btn-danger">
                                                Tolak
                                            </button>
                                            @elseif ($donation->status === 'disetujui')
                                            <button type="submit" name="new_status" value="ditolak" class="btn btn-danger">
                                                Tolak
                                            </button>
                                            @elseif ($donation->status === 'ditolak')
                                            <button type="submit" name="new_status" value="disetujui" class="btn btn-success">
                                                Setujui
                                            </button>
                                            @endif
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                    {{ $donations->links('livewire.custom-pagination-links') }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
