<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facture du mois </title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .header {
            background-color: #00b0ff;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px;
        }
        .client {
            margin: 10px 0;
        }
        .table {
            border-collapse: collapse;
            margin-bottom: 20px;
            width: 100%;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .footer {
            background-color: #00b0ff;
            color: white;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>
            <h1 style="margin: 0;">BOXLOGIN</h1>
        </div>
        <div>
            <h6>Numéro de facture {{ $livraisons[0]->uuid }}</h6>
            <p>{{ \Carbon\Carbon::now()->format('d F Y') }}</p>
        </div>
    </div>

    @foreach ($livraisons as $livraison)
        <div class="client">
            <h2>Destinataire</h2>
            <p><strong>Nom :</strong> {{ $livraison->destinataire }}</p>
            <p><strong>Numéro de destinataire :</strong> {{ $livraison->numerodes }}</p>
            <p><strong>Adresse de livraison :</strong> {{ $livraison->adresse_livraison }}</p>
        </div>

        <br>
        <br>
    @endforeach

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Colis</th>
                <th>Quantité</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livraisons as $livraison)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $livraison->colis->nom }}</td>
                    <td>{{ $livraison->destinataire }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>MENTIONS LÉGALES ET INFORMATIONS DE PAIEMENT</p>
        <p>Boxlogin</p>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
