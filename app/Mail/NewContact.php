<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;

    //definisco variabile d'istanza 
    public $lead;

    /**
     * Create a new message instance.
     */
    public function __construct($_lead = null)
    {
        // Se non viene fornito un lead, usa dei dati provvisori
        if ($_lead === null) {
            $_lead = [
                'name' => 'Mario Rossi',
                'email' => 'mario.rossi@example.com',
                'phone' => '1234567890',
                'message' => 'Questo è un messaggio di prova.'
            ];
        }

        $this->lead = $_lead;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuovo Contatto',
            replyTo: $this->lead->email,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.email',
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
