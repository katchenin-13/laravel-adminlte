@if ($request->user()->can('add') || $request->user()->can('addc')){
    <div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
                <div class="modal-dialog modal-lg" style="left:100px;">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #15a1e2; color: white;">
                            <h5 class="modal-title">Formulaire Colis</h5>
                        </div>
                        <div class="form-group">
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
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        Nom
                                                        <input type="text" wire:keydown.enter="addNewColis"
                                                            class="form-control @error('newColisName') is-invalid @enderror"
                                                            wire:model="newColisName" />
                                                        @error('newColisName')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        Quantité
                                                        <input type="decimal" wire:keydown.enter="addNewColis"
                                                            class="form-control @error('newCilisQuan') is-invalid @enderror"
                                                            wire:model="newColisQuan" />
                                                        @error('newColisQuan')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        Catégorie:
                                                        <select wire:model="selectedCategorie" class="form-control">
                                                            <option value="">Sélectionner une categorie</option>
                                                            @foreach($categories as $categorie)
                                                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('selectedCategorie')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        Colis de:
                                                        <select wire:model="selectedClient" class="form-control">
                                                            <option value="">Sélectionner une client</option>
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
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" wire:click="closeModal"><i class="fas fa-times"></i> Fermer</button>
                            <button class="btn btn-success" wire:click="addNewColis"> <i class="fa fa-check"></i> Valider</button>
                        </div>
                    </div>
                </div>
            </div>
        }
