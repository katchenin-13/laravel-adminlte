<!DOCTYPE html>
<html>
<head>
    <title>Rappel de Facture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Bonjour {{ $prenom }} {{ $nom }},</h1>
        </div>
        <p>Nous vous contactons pour vous rappeler que le paiement de votre facture est dû. Nous vous serions reconnaissants de bien vouloir régler le montant dû dans les plus brefs délais.</p>
        <p>Pour toute question ou besoin d'assistance, n'hésitez pas à nous contacter par téléphone au {{ $telephone }} ou par email à {{ $email }}. Nous sommes à votre disposition pour toute clarification nécessaire.</p>
        <p>Nous vous remercions par avance pour votre promptitude.</p>
        <div class="footer">
            <p>Cordialement,</p>
            <p><strong>L'équipe BoxLogin</strong></p>
            <a href="mailto:{{ $email }}" class="button">Nous Contacter</a>
        </div>
    </div>
</body>
</html>
