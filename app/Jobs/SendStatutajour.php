<?php

namespace App\Jobs;

use App\Notifications\Statutajour;
use App\Models\Coursier; // Assurez-vous d'ajuster le chemin du modèle si nécessaire
use App\Models\Livraison;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendStatutajour implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $livraison;

    /**
     * Create a new job instance.
     *
     * @param $livraison
     * @return void
     */
    public function __construct($livraison)
    {
        $this->livraison = $livraison;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Récupérer les coursiers associés à la livraison
        $coursiers = Coursier::where('zone_id', $this->livraison->zone_id)->get();

        foreach ($coursiers as $coursier) {
            $coursier->notify(new Statutajour($this->livraison));
        }
    }
}
