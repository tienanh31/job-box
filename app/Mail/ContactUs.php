<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable;
    use SerializesModels;

    protected array $mailData;

    public function __construct(array $mailData)
    {
        $this->mailData = $mailData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: $this->mailData['email'],
            subject: 'Contact Us',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'email.contact-us',
            with: [
                'name' => $this->mailData['name'],
                'message' => $this->mailData['message'],
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
