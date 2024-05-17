<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dossier Client</title>
    <style>
        /* Styles CSS pour la mise en page */
        .container {
            max-width: 1000px;
            margin: 20px auto 0; /* Ajout de la marge en haut */
            background-color: #fff;
            /* padding: 10px; */
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #09daff;
            margin-top: 0;
        }
        h2 {
            margin-top: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        strong {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Dossier Client</h1>

        {{-- @foreach($details as $client) --}}
        <h2>Informations personnelles du client :</h2>
        <ul>
            <li><strong>Nom complet :</strong> {{ $client->nom }} {{ $client->prenom }}</li>
            <li><strong>Adresse e-mail :</strong> {{ $client->email }}</li>
            <li><strong>Numéro de téléphone :</strong> {{ $client->telephone }}</li>
            {{-- <li><strong>Adresse postale :</strong> {{ $selectedClient->zone->nom }}</li> --}}
        </ul>

        <!-- Historique des colis -->
        <h2>Historique des colis :</h2>
        <table>
            <thead>
                <tr>
                    <th>Colis</th>
                    <th>Statut</th>
                    <th>Date de livraison prévue</th>
                    <th>Livreur</th>
                    <th>Bordereau</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Colis 1</td>
                    <td>[Statut du colis]</td>
                    <td>[Date d'envoi du colis]</td>
                    <td>[Date de livraison prévue du colis]</td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-download"></i>
                       </button>
                    </td>
                </tr>
                <!-- Ajoutez d'autres lignes pour plus de colis si nécessaire -->
            </tbody>
        </table>

        <!-- Informations sur les colis en cours -->
        <h2>Colis en transit :</h2>
        <table>
            <thead>
                <tr>
                    <th>Colis</th>
                    <th>Livreur</th>
                    <th>Date d'expédition</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Colis 1</td>
                    <td>[Nom du transporteur]</td>
                    <td>[Date d'expédition du colis]</td>
                    <td>[Numéro de suivi du colis]</td>
                </tr>
                <!-- Ajoutez d'autres lignes pour plus de colis en transit si nécessaire -->
            </tbody>
        </table>
    {{-- @endforeach --}}
</div>


</body>
</html>
