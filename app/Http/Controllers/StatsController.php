<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Coursier;
use App\Models\Employer;
use App\Models\Livraison;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index()
    {
        // Nombre de clients enregistrés par mois
        $clientsByMonth = Client::selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Nombre de coursiers par mois
        $coursiersByMonth = Coursier::selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Nombre de coursiers par zone
        $clientsByZone = Coursier::selectRaw('zones.nom as zone, COUNT(*) as count')
            ->join('zones', 'coursiers.zone_id', '=', 'zones.id')
            ->groupBy('zones.nom')
            ->get();

        // Nombre de livraisons par coursier
        $livraisonsByCoursier = Livraison::selectRaw('coursier_id, COUNT(*) as count')
            ->groupBy('coursier_id')
            ->get();

        // Nombre d'employés par mois
        $employeesByMonth = Employer::selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Nombre de livraisons par mois
        $livraisonsByMonth = Livraison::selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('stats.index', compact(
            'clientsByMonth',
            'coursiersByMonth',
            'clientsByZone',
            'livraisonsByCoursier',
            'employeesByMonth',
            'livraisonsByMonth'
        ))->extends("layouts.app")
        ->section("content");
    }
}
