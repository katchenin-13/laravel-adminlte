<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Notifications\DatabaseNotification;

class NotificationComp extends Component
{
    public $notifications;

    public function mount()
    {
        // Charger les notifications non lues de l'utilisateur
        $this->notifications = auth()->user()->unreadNotifications;
    }

    public function markAsRead($notificationId)
    {
        // Marquer la notification comme lue
        $notification = DatabaseNotification::find($notificationId);
        if ($notification) {
            $notification->markAsRead();
            // Recharger les notifications après mise à jour
            $this->notifications = auth()->user()->unreadNotifications;
        }
    }

    public function render()
    {
        return view('livewire.notification-comp');
    }
}
