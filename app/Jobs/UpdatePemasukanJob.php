<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Pemasukan;
use Carbon\Carbon;

// implements ShouldQueue
class UpdatePemasukanJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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

        $pemasukan = Pemasukan::updateOrCreate(
            ['donation_id' => $this->donation->id],
            [
                'ket_pendanaan' => 'Pemasukan Donasi',
                'total' => ($this->donation->status === 'disetujui') ? $this->donation->nominal : 0,
                'tanggal_pemasukan' => Carbon::now(),
            ]
        );
    }
}
