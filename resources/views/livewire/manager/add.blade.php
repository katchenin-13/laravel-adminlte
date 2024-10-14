<div class="modal fade" id="ShowModalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left:100px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire Manager</h5>
            </div>

            <div class="modal-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="d-flex my-4 bg-gray-light p-3">
                    <div class="d-flex flex-grow-1 mr-2">
                        <div class="flex-grow-1 mr-2">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="newNom">Nom</label>
                                        <input type="text" id="newNom" wire:keydown.defer="addNewManager"
                                            class="form-control @error('newNom') is-invalid @enderror"
                                            wire:model="newNom" placeholder="Entrez le nom" />
                                        @error('newNom')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="newPrenom">Prénom</label>
                                        <input type="text" id="newPrenom" wire:keydown.defer="addNewManager"
                                            class="form-control @error('newPrenom') is-invalid @enderror"
                                            wire:model="newPrenom" placeholder="Entrez le prénom" />
                                        @error('newPrenom')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="newPhone">Numéro de téléphone</label>
                                        <input type="tel" id="newPhone" wire:keydown.defer="addNewManager"
                                            class="form-control @error('newPhone') is-invalid @enderror"
                                            wire:model="newPhone" placeholder="Entrez le numéro de téléphone" />
                                        @error('newPhone')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="newPhone2">Numéro de téléphone 2</label>
                                        <input type="tel" id="newPhone2" wire:keydown.defer="addNewManager"
                                            class="form-control @error('newPhone2') is-invalid @enderror"
                                            wire:model="newPhone2" placeholder="Entrez le deuxième numéro de téléphone" />
                                        @error('newPhone2')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selectedEmployer">Catégorie d'employé</label>
                                        <select id="selectedEmployer" wire:model="selectedEmployer" class="form-control">
                                            <option value="">Sélectionner la catégorie d'employé</option>
                                            @foreach($employers as $employer)
                                                <option value="{{ $employer->id }}">{{ $employer->poste }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedEmployer')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="newEmail">Email</label>
                                        <input type="email" id="newEmail" wire:keydown.defer="newEmail"
                                            class="form-control @error('newEmail') is-invalid @enderror"
                                            wire:model="newEmail" placeholder="Entrez l'email" />
                                        @error('newEmail')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                <button class="btn btn-success" wire:click="addNewManager"><i class="fa fa-check"></i> Valider</button>
            </div>
        </div>
    </div>
</div>
