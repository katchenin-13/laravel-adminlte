<?php

namespace App\Notifications;

use App\Models\Livraison;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RapStatutNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $livraison;
    /**
     * Create a new notification instance.
     */
    public function __construct(Livraison $livraison)
    {
        $this->livraison = $livraison;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
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
     *
     *
     */

     public function toDatabase($notifiable)
     {
         return [
             'message' => "Rappel : Veuillez mettre à jour le statut de la livraison {$this->livraison->uuid}.",
             'livraison_id' => $this->livraison->id,
             'coursier_id' => $this->livraison->coursier_id,
         ];
     }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
