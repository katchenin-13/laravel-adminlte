<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CoursierRegister extends Mailable
{
    use Queueable, SerializesModels;
    public $coursier;

    /**
     * Create a new message instance.
     */
    public function __construct($coursier)
    {
        $this->coursier = $coursier;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Coursier Enregistrer avec succés ',
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
                        'telephone' => $this->coursier->telephone,
                        'email' => $this->coursier->email,

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
