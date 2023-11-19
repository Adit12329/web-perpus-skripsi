<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    public $isi_email;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($isi_email)
    {
        $this->isi_email = $isi_email;
    }

    public function build()
    {
        // return $this->from('madityamartono@gmail.com')
        // ->subject('Informasi Cara Kirim Email')
        // ->view('email');
        return $this->from('madityamartono@gmail.com')
                    ->subject('Pemberitahuan')
                    ->view('Email.Email');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
