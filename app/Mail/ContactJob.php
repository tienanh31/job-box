<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactJob extends Mailable implements ShouldQueue
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
            subject: $this->mailData['subject'],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'email.contact-job',
            with: [
                'companyName' => $this->mailData['companyName'],
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
