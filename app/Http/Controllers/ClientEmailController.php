<?php

// namespace App\Http\Controllers;

// use App\Models\Client;
// use App\Models\Livraison;
// use Illuminate\Support\Facades\Mail;
// use PDF; // Assurez-vous que vous avez installé une bibliothèque PDF
// use App\Mail\LivraisonPDFMail;

// class ClientEmailController extends Controller
// {
//     public function sendMonthlyEmails()
//     {
//         // Récupérer tous les clients
//         $clients = Client::whereNotNull('created_at')->get();

//         foreach ($clients as $client) {
//             // Récupérer le jour d'enregistrement
//             $dayOfRegistration = $client->created_at->day;

//             // Vérifier si aujourd'hui est le jour d'enregistrement
//             if (date('d') == $dayOfRegistration) {
//                 // Récupérer les livraisons livrées pour le client
//                 $livraisons = Livraison::where('client_id', $client->id)
//                     ->whereHas('statut', function ($query) {
//                         $query->where('nom', 'livrer');
//                     })
//                     ->get();

//                 // Générer le PDF si des livraisons livrées existent
//                 if ($livraisons->count() > 0) {
//                     $pdf = PDF::loadView('pdf_template', ['livraisons' => $livraisons]);

//                     // Envoi de l'email
//                     Mail::to($client->email)->send(new LivraisonPDFMail($pdf));
//                 }
//             }
//         }
//     }
// }
