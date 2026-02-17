<?php
// app/Http/Livewire/DonationTable.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaporanKeuangan;
use Livewire\WithPagination;

class KeuanganTable extends Component
{
    use WithPagination;
    public $year;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function render()
    {
        $keuangan = LaporanKeuangan::query()
            ->when($this->year, function ($query) {
                return $query->whereYear('created_at', $this->year);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(20);
            // ->get();

        return view('livewire.keuangan-table', compact('keuangan'));
    }

    public function sortBy($field, $type)
    {
        $this->sortField = $field;
        $this->sortDirection = ($type === 'terbaru') ? 'desc' : 'asc';
    }

    public function performSearch()
    {
        $this->render();
    }

}
