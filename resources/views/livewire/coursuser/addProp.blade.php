<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="margin-top: 50px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Créer le Compte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <!-- Champ de saisie pour le nom de la Zone -->
                <div class="form-group">
                    <label for="selectedCoursiers">Coursier</label>
                    <select id="selectedCoursiers" wire:model="selectedCoursiers" class="form-control">
                        <option value="">Sélectionner le coursier</option>
                        @foreach($coursiers as $coursier)
                            <option value="{{ $coursier->id }}">{{ $coursier->nom }}</option>
                        @endforeach
                    </select>
                    @error('selectedCoursiers')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sélecteur de commune -->
                <div class="form-group">
                    <label for="selectedUser">Sélectionner un utilisateur</label>
                    <select id="users" wire:model="selectedUser" class="form-control">
                        <option value="">Sélectionner un utilisateur</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('selectedUser')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i> Fermer
                </button>
                <button class="btn btn-success" wire:click="addNewCoursuser">
                    <i class="fa fa-check"></i> Valider
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#users').change(function() {
        var selectedUserId = $(this).val(); // Récupère l'ID de l'utilisateur sélectionné

        // Envoie une requête AJAX au serveur pour obtenir les autres utilisateurs disponibles
        $.ajax({
            url: '/user/available/' + selectedUserId,
            method: 'GET',
            success: function(data) {
                // Vider la liste déroulante pour la mettre à jour
                $('#users').empty();
                $('#users').append('<option value="">Sélectionner un utilisateur</option>');

                // Ajouter les autres utilisateurs disponibles à la liste
                $.each(data, function(index, user) {
                    $('#users').append(
                        $('<option></option>').val(user.id).text(user.name)
                    );
                });
            },
            error: function(xhr, statut, error) {
                console.error('je trpouve pas la route de la maison:', error);
            }
        });
    });
});
</script>
