<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Livraison;

class LivraisonPolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $user, Livraison $livraison)
    {
        // Si l'utilisateur est un coursier, il peut voir seulement les livraisons associées à ses colis
        return $user->hasRole('coursier') ? $user->id === $livraison->colis->user_id : true;
    }
}
