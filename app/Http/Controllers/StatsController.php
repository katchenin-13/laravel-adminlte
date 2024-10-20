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
        $clientsPerMonth = Client::selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Nombre de coursiers par mois
        $coursiersPerMonth = Coursier::selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Nombre de coursiers par zone
        $coursiersByZone = Coursier::selectRaw('zones.nom as zone, COUNT(*) as count')
            ->join('zones', 'coursiers.zone_id', '=', 'zones.id')
            ->groupBy('zones.nom')
            ->get();

        // Nombre de livraisons par coursier
        $deliveriesPerCoursier = Livraison::selectRaw('coursier_id, COUNT(*) as count')
            ->groupBy('coursier_id')
            ->get();

        // Nombre d'employés par mois
        $employeesPerMonth = Employer::selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Nombre de livraisons par mois
        $deliveriesPerMonth = Livraison::selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('stats.index', compact(
            'clientsPerMonth',
            'coursiersPerMonth',
            'coursiersByZone',
            'deliveriesPerCoursier',
            'employeesPerMonth',
            'deliveriesPerMonth'
        ))->extends("layouts.app")
        ->section("content");
    }
}
