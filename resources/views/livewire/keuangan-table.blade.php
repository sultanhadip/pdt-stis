<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-semibold">Laporan Keuangan</h5>
                    <div class="d-flex align-items-center">
                        <div class="dropdown me-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="sortingDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Urut dari yang {{ $sortDirection === 'asc' ? 'terlama' : 'terbaru' }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="sortingDropdown">
                                <li><a class="dropdown-item" wire:click="sortBy('tanggal', 'terbaru')">Urut dari yang terbaru</a></li>
                                <li><a class="dropdown-item" wire:click="sortBy('tanggal', 'terlama')">Urut dari yang terlama</a></li>
                            </ul>
                        </div>
                        <form action="{{ route('laporan.viewLaporan') }}" method="GET"
                            class="d-flex align-items-center">
                            <input wire:model="year" wire:input="performSearch" type="text" class="form-control"
                                placeholder="Cari tahun donasi" aria-label="Search" aria-describedby="searchButton">
                            <button wire:click="performSearch" class="btn btn-primary" type="button"
                                id="searchButton">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Tanggal</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Jenis Keuangan</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Deskripsi</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nominal</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0" style="text-align: center">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keuangan as $item)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->format('j F Y') }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $item->tipe }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $item->name }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $item->debit }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex justify-content-center">
                                                @if ($item->tipe == 'Pemasukan')
                                                    <a href="{{ route('pemasukan.edit', $item->id) }}"
                                                        class="btn btn-warning me-2">Edit</a>
                                                    <form action="{{ route('pemasukan.destroy', $item->id) }}"
                                                        method="POST">
                                                    @elseif ($item->tipe == 'Pengeluaran')
                                                        <a href="{{ route('pengeluaran.edit', $item->id) }}"
                                                            class="btn btn-warning me-2">Edit</a>
                                                        <form action="{{ route('pengeluaran.destroy', $item->id) }}"
                                                            method="POST">
                                                @endif
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="button-container">
                    <a href="{{ route('pemasukan.create') }}" class="btn btn-primary"
                        id="pemasukanButton">Pemasukan</a>
                    <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary"
                        id="pengeluaranButton">Pengeluaran</a>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        {{ $keuangan->links('livewire.custom-pagination-links') }}
    </div>
</div>
