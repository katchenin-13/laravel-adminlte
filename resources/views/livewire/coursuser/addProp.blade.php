<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="margin-top: 50px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Compte Utilisateur Coursier </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex my-4 bg-gray-light p-3">
                    <div class="d-flex flex-grow-1 mr-2">
                        <div class="flex-grow-1 mr-2">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <!-- Champ de saisie pour le nom de la commune -->
                            <div class="form-group">
                                <label for="selectedCoursiers">Coursier</label>
                                <select id="selectedCoursiers" wire:model="selectedCoursiers" class="form-control">
                                    <option value="">Sélectionner le coursier</option>
                                    @foreach($coursiers as $coursier)
                                        <option value="{{ $coursier->id }}">{{ $coursier->nom }}</option>
                                    @endforeach
                                </select>
                                @error('selectedCoursiers')
                                 <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                 @enderror
                            </div>

                            <div class="form-group">
                                <label for="selectedUser">Sélectionner un utilisateur</label>
                                <select id="selectedUser" wire:model="selectedUser" class="form-control">
                                    <option value="">Sélectionner un utilisateur</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectedUser')
                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
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

