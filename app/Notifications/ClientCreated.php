<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Client;

class ClientCreated extends Notification
{
    use Queueable;
    protected $client;
    /**
     * Create a new notification instance.
     */

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Votre compte a été créé avec succès.')
            ->line('Nom: ' . $this->client->nom)
            ->line('Prénom: ' . $this->client->prenom)
            ->line('Téléphone: ' . $this->client->telephone)
            ->line('Email: ' . $this->client->email)
            ->line('Merci d\'utiliser notre application !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

