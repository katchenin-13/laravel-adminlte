<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left: 100px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire Colis</h5>
            </div>
            <div class="modal-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="d-flex my-4 bg-gray-light p-3">
                    <div class="flex-grow-1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="newColisName">Nom</label>
                                    <input type="text" wire:keydown.enter="addNewColis"
                                           class="form-control @error('newColisName') is-invalid @enderror"
                                           wire:model="newColisName" id="newColisName" />
                                    @error('newColisName')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="newColisQuan">Quantité</label>
                                    <input type="number" wire:keydown.enter="addNewColis"
                                           class="form-control @error('newCilisQuan') is-invalid @enderror"
                                           wire:model="newColisQuan" id="newColisQuan" />
                                    @error('newCilisQuan')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="selectedCategorie">Catégorie</label>
                                    <select wire:model="selectedCategorie" class="form-control" id="selectedCategorie">
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedCategorie')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="selectedCoursier">Coursier</label>
                                    <select id="selectedCoursier" wire:model="selectedCoursier" class="form-control">
                                        <option value="">Sélectionner le Coursier</option>
                                            @if (auth()->user()->hasRole('superadmin') || auth()->user()->hasRole('manager'))
                                                @foreach ($coursiers as $coursier)
                                                    <option value="{{ $coursier->id }}">{{ $coursier->nom }}</option>
                                                @endforeach
                                            @elseif (auth()->user()->hasRole('coursier'))
                                                <option value="{{ auth()->user()->coursier->id }}">{{ auth()->user()->coursier->nom }}</option>
                                            @else
                                        <option value="">Aucun coursier associé</option>
                                        @endif
                                    </select>
                                    @error('selectedCoursier')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="selectedClient">Colis de</label>
                                    <select wire:model="selectedClient" class="form-control" id="selectedClient">
                                        <option value="">Sélectionner un client</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedClient')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description"
                                              class="form-control @error('newColisDes') is-invalid @enderror"
                                              wire:model="newColisDes"></textarea>
                                    @error('newColisDes')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i> Fermer
                </button>
                <button class="btn btn-success" wire:click="addNewColis">
                    <i class="fa fa-check"></i> Valider
                </button>
            </div>
        </div>
    </div>
</div>
