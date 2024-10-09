<?php

namespace App\Http\Controllers;

use App\Models\Coursier;
use App\Models\Coursuser;
use Illuminate\Http\Request;

class SelectCoursuser extends Controller
{
    public function getAvailableCoursiers(Request $request)
{
    $clientId = $request->input('client_id');

    // Rechercher les coursiers associés à ce client
    $coursiersAssocies = Coursuser::where('client_id', $clientId)->pluck('coursier_id')->toArray();

    // Récupérer les coursiers non associés
    $coursiersDisponibles = Coursier::whereNotIn('id', $coursiersAssocies)->get();

    return response()->json($coursiersDisponibles);
}
}
