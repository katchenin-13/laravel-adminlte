@extends('layouts.app')

@section('content')
    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#modification').click(function(event) {
                event.preventDefault(); // Empêche le comportement par défaut du bouton

                // Remplacer le contenu de la classe 'user' par un champ de mot de passe et un bouton de soumission
                $('.user').html('<strong>Nouveau mot de passe:</strong> <input type="password" id="newPassword" name="newPassword" class="form-control mb-2" placeholder="Entrez le nouveau mot de passe"> <button id="submitPassword" class="btn btn-success">Soumettre</button>');

                // Gérer la soumission du nouveau mot de passe ici si nécessaire
                $('#submitPassword').click(function() {
                    var newPassword = $('#newPassword').val();
                    // Faire quelque chose avec le nouveau mot de passe (par exemple, envoyer à un backend via AJAX)
                    console.log('Nouveau mot de passe:', newPassword);
                    alert('Nouveau mot de passe soumis: ' + newPassword);
                });
            });
        });
    </script>

    <!-- Contenu principal -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="alert alert-info text-center" role="alert">
                        <h2>Espace Utilisateur</h2>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Contenu principal -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Carte de profil -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title mb-0"><strong>Profil Utilisateur</strong></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Nom:</strong> {{ Auth::user()->name }}</p>
                                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                    <!-- Ajouter d'autres informations de profil si nécessaire -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Ajouter une photo de profil ici si nécessaire -->
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">Modifier le Profil</a>
                            <!-- Ajouter d'autres actions liées au profil ici -->
                        </div>
                    </div>

                    <!-- Carte de sécurité du compte -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0"><strong>Sécurité du Compte</strong></h5>
                        </div>
                        <div class="card-body">
                            <button id="modification" class="btn btn-warning">Changer le Mot de Passe</button>
                            <!-- Ajouter d'autres options de sécurité du compte ici -->
                        </div>
                        <div class="card-body user">
                            <p><strong>Mot de passe:</strong>***********</p>
                        </div>
                    </div>

                    <!-- Carte d'historique des commandes -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Historique des Commandes</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Montant Total</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Remplacez par la vraie boucle pour afficher les commandes de l'utilisateur -->
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->uuid }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary">Voir Toutes les Commandes</a>
                            <!-- Ajouter d'autres informations liées aux commandes ici -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
