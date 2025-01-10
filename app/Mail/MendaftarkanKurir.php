<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MendaftarkanKurir extends Mailable
{
    use Queueable, SerializesModels;
    protected $password;
    /**
     * Create a new message instance.
     */
    public function __construct($password)
    {
        $this->password = $password;
    }

    public function build()
    {
        $data = [
            'password' =>$this->password,
        ];

        return $this->subject('Selamat Anda Diterima Sebagai kurir')
        ->view('admin.mail.kurir_diterima', $data);
    }
}
