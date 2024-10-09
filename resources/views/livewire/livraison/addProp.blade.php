@if(auth()->user()->hasRole('superadmin'))
    <div class="modal fade" id="ShowModalProp" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-lg" style="left: 100px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #15a1e2; color: white;">
                    <h5 class="modal-title">Enregistrement de Livraison</h5>
                </div>
                <div class="modal-body">
                    <div class="d-flex my-1 bg-gray-light p-1">
                        <div class="flex-grow-1 mr-2">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="newDestinataireName">Destinataire</label>
                                        <input type="text" id="newDestinataireName" wire:model.defer="newDestinataireName"
                                            class="form-control @error('newDestinataireName') is-invalid @enderror"/>
                                        @error('newDestinataireName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="newLivraisonsAdd">Adresse</label>
                                        <input type="text" id="newLivraisonsAdd" wire:model.defer="newLivraisonsAdd"
                                            class="form-control @error('newLivraisonsAdd') is-invalid @enderror"/>
                                        @error('newLivraisonsAdd')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="newLivraisonsPhone">Téléphone</label>
                                        <input type="text" id="newLivraisonsPhone" wire:model.defer="newLivraisonsPhone"
                                            class="form-control @error('newLivraisonsPhone') is-invalid @enderror"/>
                                        @error('newLivraisonsPhone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selectedCoursiers">Coursier</label>
                                        <select id="selectedCoursiers" wire:model="selectedCoursiers" class="form-control">
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
                                        @error('selectedCoursiers')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selectedClient">Colis de</label>
                                        <select id="selectedClient" wire:model="selectedClient" class="form-control">
                                            <option value="">Sélectionner le Client</option>
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedClient')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selectedColis">Colis</label>
                                        <select id="selectedColis" wire:model.defer="selectedColis" class="form-control">
                                            <option value="">Sélectionner le Colis</option>
                                            @foreach($colis as $colisItem)
                                                <option value="{{ $colisItem->id }}">{{ $colisItem->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedColis')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selectedStatut">Statut</label>
                                        <select id="selectedStatut" wire:model.defer="selectedStatut" class="form-control">
                                            <option value="">Sélectionner le Statut</option>
                                            @foreach($statuts as $statut)
                                                <option value="{{ $statut->id }}">{{ $statut->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedStatut')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                    <button class="btn btn-success" wire:click="addNewLivraison">
                        <i class="fa fa-check"></i> Valider
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(auth()->user()->hasRole('coursier'))
    <div class="modal fade" id="ShowModalProp" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-lg" style="left: 100px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #15a1e2; color: white;">
                    <h5 class="modal-title">Enregistrement de Livraison</h5>
                </div>
                <div class="modal-body">
                    <div class="d-flex my-1 bg-gray-light p-1">
                        <div class="flex-grow-1 mr-2">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="newDestinataireName">Destinataire</label>
                                        <input type="text" id="newDestinataireName" wire:model.defer="newDestinataireName"
                                            class="form-control @error('newDestinataireName') is-invalid @enderror"/>
                                        @error('newDestinataireName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="newLivraisonsAdd">Adresse</label>
                                        <input type="text" id="newLivraisonsAdd" wire:model.defer="newLivraisonsAdd"
                                            class="form-control @error('newLivraisonsAdd') is-invalid @enderror"/>
                                        @error('newLivraisonsAdd')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="newLivraisonsPhone">Téléphone</label>
                                        <input type="text" id="newLivraisonsPhone" wire:model.defer="newLivraisonsPhone"
                                            class="form-control @error('newLivraisonsPhone') is-invalid @enderror"/>
                                        @error('newLivraisonsPhone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selectedCoursiers">Coursier</label>
                                        <select id="selectedCoursiers" wire:model="selectedCoursiers" class="form-control">
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
                                        @error('selectedCoursiers')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selectedClient">Colis de</label>
                                        <select id="selectedClient" wire:model="selectedClient" class="form-control">
                                            <option value="">Sélectionner le Client</option>
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedClient')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selectedColis">Colis</label>
                                        <select id="selectedColis" wire:model.defer="selectedColis" class="form-control">
                                            <option value="">Sélectionner le Colis</option>
                                            @foreach($colis as $colisItem)
                                                <option value="{{ $colisItem->id }}">{{ $colisItem->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedColis')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selectedStatut">Statut</label>
                                        <select id="selectedStatut" wire:model.defer="selectedStatut" class="form-control">
                                            <option value="">Sélectionner le Statut</option>
                                            @foreach($statuts as $statut)
                                                <option value="{{ $statut->id }}">{{ $statut->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedStatut')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                    <button class="btn btn-success" wire:click="addNewLivraison">
                        <i class="fa fa-check"></i> Valider
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
