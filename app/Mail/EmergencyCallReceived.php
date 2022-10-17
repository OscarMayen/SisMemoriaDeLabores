<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class EmergencyCallReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $vdatos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($vdatos)
    {
        $this->vdatos=$vdatos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('sistema.mails.envioMail');
    }
}
