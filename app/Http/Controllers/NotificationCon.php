<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationCon extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Récupère les notifications non lues
        $unreadNotifications = $user->unreadNotifications;

        return view('.livewire.Notification.index', compact('unreadNotifications'));
    }

    public function fetchNotifications()
    {
        $user = auth()->user();
        $unreadNotifications = $user->unreadNotifications;

        // Rendre la vue partielle pour les notifications
        $notificationsView = view('notifications.partials.list', compact('unreadNotifications'))->render();

        return response()->json([
            'notifications' => $notificationsView,
            'unreadCount' => $unreadNotifications->count(),
        ]);
    }

    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);
        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->route('livraison', ['livraison' => $notification->data['livraison_id']]);
    }

}
