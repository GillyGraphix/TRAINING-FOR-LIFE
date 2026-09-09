<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriberWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct() {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Karibu Training For Life - Newsletter',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome_subscriber',
        );
    }
}