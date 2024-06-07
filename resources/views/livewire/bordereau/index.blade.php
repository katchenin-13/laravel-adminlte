<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bordereau</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
            padding:  30px 30px 30px;
        }
        .client {
            margin: 10px 0px 200px;
        }
        .table {
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .footer {
            background-color: #00b0ff;
            color: white;
            padding:  10px 10px 5px;
        }
    </style>
</head>
<body class="container">
      <div class="header">
        <div>
            <h1 style="margin: 0;">BOXLOGIN</h1>
        </div>
        <div>
            <h6>Numéro de facture n°12345</h6>
            <p>18 mai 2027</p>
        </div>
    </div>


    <div>
        
        @foreach ($livraisons as $livraison )    
            <div class="client">
                <h2>CLIENT</h2>
                <p>{{ $livraison->destinataire }}</p>
                <p>{{ $livraison->numerodes }}</p>
                <p>{{ $livraison->adresse_livraison }}</p>
            </div>
        @endforeach

        <table class="table">
        
            <thead>
                <tr>
                    <th>No</th>
                    <th>Description</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            @foreach($livraisons as $livraison)
               <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $livraison->colis->nom }}</td>
                        <td>{{ $livraison->colis->quantité }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>

    <div class="footer">
        <p>MENTIONS LÉGALES ET</p>
        <p>INFORMATIONS DE PAIEMENT</p>
        <p>Boxlogin</p>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
