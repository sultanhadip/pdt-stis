<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\LaporanKeuangan;

class UpdateLaporanJob implements ShouldQueue
{
    public $donation;
    /**
     * Create a new job instance.
     */
    public function __construct($donation)
    {
        $this->donation = $donation;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (!$this->donation || !$this->donation->id) {
            return;
        }

        $laporan = LaporanKeuangan::updateOrCreate(
            ['donation_id' => $this->donation->id],
            [
                'name' => 'Pemasukan Donasi',
                'tipe'=>'Pemasukan',
                'debit' => ($this->donation->status === 'disetujui') ? $this->donation->nominal : 0,
            ]
        );
    }
}
