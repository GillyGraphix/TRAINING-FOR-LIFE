<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewSubscriberNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriberEmail;

    public function __construct($subscriberEmail)
    {
        $this->subscriberEmail = $subscriberEmail;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Newsletter Subscriber - Training For Life',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new_subscriber', // Hili ni faili tutakalotengeneza hatua inayofuata
        );
    }
}