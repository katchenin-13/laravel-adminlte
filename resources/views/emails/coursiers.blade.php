<!DOCTYPE html>
<html>
<head>
    <title>🎉Bienvenue🎉</title>
</head>
<body>
    <h1>Bonjour {{ $coursier->nom }} {{ $coursier->prenom }},</h1>
    <p>Nous sommes ravis de vous accueillir chez nous ! Votre compte a été créé avec succès le {{ $client->created_at->format('d M Y') }}.</p>
    <p>Voici vos informations pour vous login.</p>
    <h1>Bonjour {{ $user->email }} {{ $client->password }},</h1>
    <p>Cordialement,<br>L'équipe de BoxLogin</p>
</body>
</html>
