<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WinnerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $client;
    public $entry;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $entry)
    {
        $this->client = $client;
        $this->entry = $entry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Promotion Update!')->markdown('winner-mail', [
            'client' => $this->client,
            'entry' => $this->entry
        ]);
    }
}
