<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Manager;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class InfoManager extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $manager;

    /**
     * Create a new message instance.
     */
    public function __construct(Manager $manager, User $user)
    {
        $this->manager = $manager;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Informations concernant votre compte !',
        );
    }

    public function build()
    {
        return $this->view('emails.infoManager')
                    ->with([
                        'managerName' => $this->manager->nom,
                        'userEmail' => $this->user->email,
                        'userPassword' => $this->user->password,
                    ]);
    }


    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: '',
    //     );
    // }

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
