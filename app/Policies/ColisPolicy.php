<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Colis;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColisPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function view(User $user, Colis $colis)
    {
        if ($user->role === 'coursier') {
            return $user->coursier->id === $colis->coursier_id;
        }

        // Si ce n'est pas un coursier, on donne accès à tous les colis
        return true;
    }
}
