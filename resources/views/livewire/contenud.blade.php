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
            font-family: 'Quicksand', sans-serif;
            color: #09daff;
            margin-top: 0;
        }
        h2 {
            margin-top: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        table {
            border: 5px;
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
            <li><strong>Identifiant :</strong> {{ $contenu->uuid }}
            <li><strong>Nom complet :</strong> {{ $contenu->nom }} {{ $contenu->prenom }}</li>
            <li><strong>Adresse e-mail :</strong> {{ $contenu->email }}</li>
            <li><strong>Numéro de téléphone :</strong> {{ $contenu->telephone }}</li>
             <li><strong>Zone :</strong> {{ $contenu->zone->nom }}</li>
        </ul>


  <!-- Historique des colis livrés -->
<h2>Historique des colis livrés :</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Colis</th>
            <th>Destinataire</th>
            <th>Date de livraison</th>
            <th>Livreur</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($livraisons as $livraison)
            @if($livraison->statut->nom === 'livrer')
                <tr>
                    <td>{{ $livraison->uuid }}</td>
                    <td>{{ $livraison->colis->nom }}</td>
                    <td>{{ $livraison->destinataire }}</td>
                    <td>{{ $livraison->created_at->format('d/m/Y') }}</td>
                    <td>{{ $livraison->coursier->nom }}</td>
                    <td>
                        <a href="{{ route('bordereau', ['livraison' => $livraison->id]) }}">
                            <i class="fa fa-download"></i>
                        </a>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

<!-- Colis en transit -->
<h2>Colis en transit :</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Colis</th>
            <th>Livreur</th>
            <th>Adresse</th>
            <th>Téléphone</th>
        </tr>
    </thead>
    <tbody>
        @foreach($livraisons as $livraison)
            @if($livraison->statut->nom === 'en cours')
                <tr>
                    <td>{{ $livraison->uuid }}</td>
                    <td>{{ $livraison->colis->nom }}</td>
                    <td>{{ $livraison->coursier->nom }}</td>
                    <td>{{ $livraison->adresse_livraison }}</td>
                    <td>{{ $livraison->numerodes }}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

</div>


</body>
</html>
