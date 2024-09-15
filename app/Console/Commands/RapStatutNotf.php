<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Delivery;
use App\Models\Livraison;
use Illuminate\Console\Command;
use App\Notifications\RappelNotif;

class RapStatutNotf extends Command
{
  /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:remind'; // Nom plus descriptif

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoie des notifications de rappel pour mettre à jour le statut du colis';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Trouver les livraisons créées il y a plus de 30 minutes et dont le statut n'est pas 'livré' ou 'annulé'
        $livraisons = Livraison::with('coursier.user') // Eager load 'coursier' et 'user' associés
            ->where('created_at', '<=', Carbon::now()->subMinutes(1)) // Correction de l'intervalle de temps
            ->whereNotIn('status', ['livré', 'annulé']) // Exclure les statuts 'livré' et 'annulé'
            ->get();

        foreach ($livraisons as $livraison) {
            // Récupérer le coursier associé à la livraison
            $coursier = $livraison->coursier;

            if ($coursier) {
                // Récupérer l'utilisateur associé au coursier via la relation one-to-one
                $user = $coursier->user; // ou $coursier->user() si la méthode de relation est différente
                if ($user) {
                    $user->notify(new RappelNotif($livraison));
                }
            }
        }

        $this->info('Notifications sent successfully!');
    }
}
