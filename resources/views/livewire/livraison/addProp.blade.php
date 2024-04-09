<div class="modal fade" id="ShowModalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left:100px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Enregistrement de Livraison</h5>
            </div>
            <div class="form-group">
                <div class="modal-body">
                    <div class="d-flex my-1 bg-gray-light p-1">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="flex-grow-1 mr-2">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">Destinataire
                                            <input type="text" wire:model.defer="newDestinataireName"
                                                   class="form-control @error('newDestinataireName') is-invalid @enderror"/>
                                            @error('newDestinataireName')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">Adresse
                                            <input type="text" wire:model.defer="newLivraisonsAdd"
                                                   class="form-control @error('newLivraisonsAdd') is-invalid @enderror"/>
                                            @error('newLivraisonsAdd')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">Téléphone
                                            <input type="text" wire:model.defer="newLivraisonsPhone"
                                                   class="form-control @error('newLivraisonsPhone') is-invalid @enderror"/>
                                            @error('newLivraisonsPhone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">Coursier:
                                            <select wire:model.defer="selectedCoursiers" class="form-control">
                                                <option value="">Sélectionner le Coursier</option>
                                                @foreach($coursiers as $coursier)
                                                    <option value="{{ $coursier->id }}">{{ $coursier->nom }}</option>
                                                @endforeach
                                            </select>
                                            @error('selectedCoursiers')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">Colis:
                                            <select wire:model.defer="selectedColis" class="form-control">
                                                <option value="">Sélectionner le Colis</option>
                                                @foreach($colis as $coli)
                                                    <option value="{{ $coli->id }}">{{ $coli->nom }}</option>
                                                @endforeach
                                            </select>
                                            @error('selectedColis')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">Statut:
                                            <select wire:model.defer="selectedStatut" class="form-control">
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click="closeshowModal"><i class="fas fa-times"></i> Fermer</button>
                <button class="btn btn-success" wire:click="addNewLivraison"><i class="fa fa-check"></i> Valider</button>
            </div>
        </div>
    </div>
</div>