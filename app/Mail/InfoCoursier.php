<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InfoCoursier extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $coursier;


    /**
     * Create a new message instance.
     */
    public function __construct($user,$coursier)
    {
        $this->user = $user;
        $this->coursier = $coursier;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Info Coursier',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('emails.coursiers')
                    ->with([
                        'nom' => $this->coursier->nom,
                        'prenom' => $this->coursier->prenom,
                        'email' => $this->user->email,
                        'password' => $this->user->password,

                    ]);
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
