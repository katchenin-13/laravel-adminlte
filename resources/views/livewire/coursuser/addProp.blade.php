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
                <div id="success-message" class="alert alert-success d-none"></div>

                <!-- Champ de saisie pour le nom de la Zone -->
                <div class="form-group">
                    <label for="selectedCoursiers">Coursier</label>
                    <select id="selectedCoursiers" class="form-control">
                        <option value="">Sélectionner le coursier</option>
                        @foreach($coursiers as $coursier)
                            <option value="{{ $coursier->id }}">{{ $coursier->nom }}</option>
                        @endforeach
                    </select>
                    <div id="error-coursiers" class="invalid-feedback"></div>
                </div>

                <!-- Sélecteur de commune -->
                <div class="form-group">
                    <label for="selectedUser">Sélectionner un utilisateur</label>
                    <select id="selectedUser" class="form-control">
                        <option value="">Sélectionner un utilisateur</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div id="error-user" class="invalid-feedback"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i> Fermer
                </button>
                <button id="saveButton" class="btn btn-success">
                    <i class="fa fa-check"></i> Valider
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#saveButton').click(function() {
            $.ajax({
                url: '{{ route('add.coursuser') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    selectedCoursiers: $('#selectedCoursiers').val(),
                    selectedUser: $('#selectedUser').val(),
                },
                success: function(response) {
                    $('#success-message').text(response.message).removeClass('d-none');

                    // Clear existing options
                    $('#selectedCoursiers').find('option').not(':first').remove();
                    $('#selectedUser').find('option').not(':first').remove();

                    // Append new options
                    $.each(response.coursiers, function(index, coursier) {
                        $('#selectedCoursiers').append(
                            $('<option>').val(coursier.id).text(coursier.nom)
                        );
                    });

                    $.each(response.users, function(index, user) {
                        $('#selectedUser').append(
                            $('<option>').val(user.id).text(user.name)
                        );
                    });

                    // Reset the form
                    $('#selectedCoursiers').val('');
                    $('#selectedUser').val('');
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    if (errors.selectedCoursiers) {
                        $('#error-coursiers').text(errors.selectedCoursiers[0]).show();
                    } else {
                        $('#error-coursiers').hide();
                    }
                    if (errors.selectedUser) {
                        $('#error-user').text(errors.selectedUser[0]).show();
                    } else {
                        $('#error-user').hide();
                    }
                }
            });
        });
    });
</script>
