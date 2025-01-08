<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $tries = 5;
    public $data = [];

    public function __construct($message, $iduser_from, $iduser_to, $ticket)
    {
        $this->data = [
            'user_from' => User::find($iduser_from)->name,
            'user_to' => User::find($iduser_to)->name,
            'message' => $message,
            'ticketcode' => $ticket->tickets->ticketcode,
        ];
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notifikasi Pesan Tiket',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.ticket_notification',
            with: [
                'data' => $this->data,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
