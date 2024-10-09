<!DOCTYPE html>
<html>
<head>
    <title>🎉Bienvenue🎉</title>
</head>
<body>
    <h1>Bonjour {{ $client->prenom }} {{ $client->nom }},</h1>
    <p>Nous sommes ravis de vous accueillir chez nous ! Votre compte a été créé avec succès le {{ $client->created_at->format('d M Y') }}.</p>
    <p>Merci de faire confiance à nos services.</p>
    <p>Cordialement,<br>L'équipe de BoxLogin</p>
</body>
</html>
