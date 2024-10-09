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

        // Formatage des données des mois
        $clientsPerMonth = $this->formatMonthData($clientsPerMonth);
        $coursiersPerMonth = $this->formatMonthData($coursiersPerMonth);
        $employeesPerMonth = $this->formatMonthData($employeesPerMonth);
        $deliveriesPerMonth = $this->formatMonthData($deliveriesPerMonth);

        return view('stat.index', compact(
            'clientsPerMonth',
            'coursiersPerMonth',
            'coursiersByZone',
            'deliveriesPerCoursier',
            'employeesPerMonth',
            'deliveriesPerMonth'
        ))->extends("layouts.app")
        ->section("content");
    }

    private function formatMonthData($data)
    {
        $monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jui', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];

        return $data->map(function ($item) use ($monthNames) {
            $monthIndex = (int)explode('-', $item->month)[1] - 1; // Récupérer le mois
            $item->month = $monthNames[$monthIndex]; // Remplacer par le nom du mois
            return $item;
        });
    }
}
