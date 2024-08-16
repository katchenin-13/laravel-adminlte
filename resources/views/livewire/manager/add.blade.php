<div class="modal fade" id="ShowModalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire Employé</h5>
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

                <div class="bg-light p-3 rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="newnom">Nom</label>
                                <input type="text" id="newnom" wire:keydown.enter="addNewManager"
                                       class="form-control @error('newnom') is-invalid @enderror"
                                       wire:model="newnom" placeholder="Entrez le nom" />
                                @error('newnom')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="newprenom">Prénom</label>
                                <input type="text" id="newprenom" wire:keydown.enter="addNewManager"
                                       class="form-control @error('newprenom') is-invalid @enderror"
                                       wire:model="newprenom" placeholder="Entrez le prénom" />
                                @error('newprenom')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="newphone">Numéro de téléphone</label>
                                <input type="tel" id="newphone" wire:keydown.enter="addNewManager"
                                       class="form-control @error('newphone') is-invalid @enderror"
                                       wire:model="newphone" placeholder="Entrez le numéro de téléphone" />
                                @error('newphone')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="newphone2">Numéro de téléphone 2</label>
                                <input type="tel" id="newphone2" wire:keydown.enter="addNewManager"
                                       class="form-control @error('newphone2') is-invalid @enderror"
                                       wire:model="newphone2" placeholder="Entrez le deuxième numéro de téléphone" />
                                @error('newphone2')
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
                                <label for="newemail">Email</label>
                                <input type="email" id="newemail" wire:keydown.enter="addNewManager"
                                       class="form-control @error('newemail') is-invalid @enderror"
                                       wire:model="newemail" placeholder="Entrez l'email" />
                                @error('newemail')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
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
