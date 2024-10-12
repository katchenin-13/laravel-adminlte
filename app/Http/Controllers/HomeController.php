<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zone;
use App\Models\Client;
use App\Models\Commune;
use App\Models\Coursier;
use App\Models\Livraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = User::count();
        $communeCount = Commune::count();
        $coursierCount = Coursier::count();
        $clientCount = Client::count();
        $zoneCount = Zone::count();

        $user = Auth::user();

        // Initialiser les livraisons en fonction du rôle de l'utilisateur
        $livraisons = $this->getLivraisonsForUser($user);

        return view('home', compact('userCount', 'communeCount', 'coursierCount', 'clientCount', 'livraisons','zoneCount'));
    }

    /**
     * Get livraisons based on the user's role.
     *
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getLivraisonsForUser($user)
    {
        if ($user->hasRole('superadmin') || $user->hasRole('manager')) {
            return Livraison::all(); // Tous les livraisons
        } elseif ($user->hasRole('coursier')) {
            $coursier = $user->coursier()->first(); // Obtenir le coursier associé
            return $coursier ? Livraison::where('coursier_id', $coursier->id)->get() : collect();
        }

        return collect(); // Pour les autres utilisateurs
    }
}
