<?php

namespace App\Mail;

// use Faker\Provider\en_US\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KirimEmail extends Mailable
{
    public $isi_email;
    public $data;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($isi_email, $data)
    {
        //
        $this->isi_email = $isi_email;
        $this->data = $data;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('madityamartono@gmail.com','SMPN 2 SUKOWONO'),
            subject: 'Pemberitahuan Pengembalian Buku',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Email.Email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
