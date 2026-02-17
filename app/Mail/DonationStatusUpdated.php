<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DonationStatusUpdated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $donation;

    public function __construct($donation)
    {
        $this->donation = $donation;
    }

    public function build()
    {
        return $this->view('emails.donation-status-updated')
            ->subject('Donation Status Updated');
    }
}
