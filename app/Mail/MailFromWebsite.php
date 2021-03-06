<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailFromWebsite extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    protected $attributes;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('MailFromUser', ['attributes' => $this->attributes]);
    }
}
