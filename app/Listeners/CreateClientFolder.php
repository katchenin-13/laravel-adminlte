<?php

namespace App\Listeners;

use App\Events\NewclientCreated;
use Illuminate\Support\Facades\File;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateClientFolder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewclientCreated $event): void
    {
        $client = $event->client;
        $folderPath = resource_path('views.livewire.dossier' . $client->id); // Chemin vers le répertoire dossier/clients

        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0777, true);
        }

    }
}
