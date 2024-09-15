<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RappelNotif extends Notification
{
    use Queueable;

    private $livraison;

    public function __construct($livraison)
    {
        $this->livraison = $livraison;
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
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

     public function toDatabase($notifiable)
     {
         return [
            'message' => 'Veuillez mettre à jour le statut de la livraison : ' . $this->livraison->id,
            'livraison_id' => $this->livraison->id,
            'coursier_id' => $this->livraison->coursier_id,
            'status' => $this->livraison->statut->nom,
         ];
     }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
