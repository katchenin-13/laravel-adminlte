<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Coursier;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class InfoCoursier extends Mailable
{
    use Queueable, SerializesModels;
    public $coursier;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct(Coursier $coursier, User $user)
    {
        $this->coursier = $coursier;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Informations concernant votre compte !'

        );
    }

    public function build()
    {
        return $this->view('emails.infoCoursier')
                    ->with([
                        'coursierName' => $this->coursier->name,
                        'userEmail' => $this->user->email,
                        'userPassword' => $this->user->password,
                    ]);
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
