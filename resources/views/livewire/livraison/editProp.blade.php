@if(auth()->user()->hasRole('superadmin'))
<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left:100px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Édition Livraison</h5>
            </div>

            <form role="form" wire:submit.prevent="updateLivraison({{ $editLivraisonsid }})">
                @csrf
                <div class="modal-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="d-flex my-1 bg-gray-light p-1">
                        <div class="flex-grow-1 mr-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="editDestinataireName">Destinataire</label>
                                        <input type="text" wire:model.defer="editDestinataireName"
                                               class="form-control @error('editDestinataireName') is-invalid @enderror"/>
                                        @error('editDestinataireName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="editLivraisonsAdd">Adresse</label>
                                        <input type="text" wire:model.defer="editLivraisonsAdd"
                                               class="form-control @error('editLivraisonsAdd') is-invalid @enderror"/>
                                        @error('editLivraisonsAdd')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="editLivraisonsPhone">Téléphone</label>
                                        <input type="phone" wire:model.defer="editLivraisonsPhone"
                                               class="form-control @error('editLivraisonsPhone') is-invalid @enderror"/>
                                        @error('editLivraisonsPhone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="selectedCoursiers">Coursier</label>
                                        <select wire:model="selectedCoursiers" class="form-control">
                                            <option value="">Sélectionner un coursier</option>
                                            @if (auth()->user()->hasRole('superadmin') || auth()->user()->hasRole('manager'))
                                                @foreach ($coursiers as $coursier)
                                                    <option value="{{ $coursier->id }}">{{ $coursier->name }}</option>
                                                @endforeach
                                            @elseif (auth()->user()->hasRole('coursier'))
                                                <option value="{{ auth()->user()->coursier->id }}">{{ auth()->user()->coursier->name }}</option>
                                            @else
                                                <option value="">Aucun coursier associé</option>
                                            @endif
                                        </select>
                                        @error('selectedCoursiers')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="selectedColis">Colis</label>
                                        <select wire:model="selectedColis" class="form-control">
                                            <option value="">Sélectionner un colis</option>
                                            @foreach($colis as $colis)
                                                <option value="{{ $colis->id }}">{{ $colis->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedColis')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="selectedStatut">Statut</label>
                                        <select wire:model="selectedStatut" class="form-control">
                                            <option value="">Sélectionner un statut</option>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times"></i> Fermer
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Valider
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@if(auth()->user()->hasRole('coursier'))
<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left:100px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Édition Livraison</h5>
            </div>

            <form role="form" wire:submit.prevent="updateLivraison({{ $editLivraisonsid }})">
                @csrf
                <div class="modal-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="d-flex my-1 bg-gray-light p-1">
                        <div class="flex-grow-1 mr-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="editDestinataireName">Destinataire</label>
                                        <input type="text" wire:model.defer="editDestinataireName"
                                               class="form-control @error('editDestinataireName') is-invalid @enderror"/>
                                        @error('editDestinataireName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="editLivraisonsAdd">Adresse</label>
                                        <input type="text" wire:model.defer="editLivraisonsAdd"
                                               class="form-control @error('editLivraisonsAdd') is-invalid @enderror"/>
                                        @error('editLivraisonsAdd')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="editLivraisonsPhone">Téléphone</label>
                                        <input type="phone" wire:model.defer="editLivraisonsPhone"
                                               class="form-control @error('editLivraisonsPhone') is-invalid @enderror"/>
                                        @error('editLivraisonsPhone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="selectedCoursiers">Coursier</label>
                                        <select wire:model="selectedCoursiers" class="form-control">
                                            <option value="">Sélectionner un coursier</option>
                                            @if (auth()->user()->hasRole('superadmin') || auth()->user()->hasRole('manager'))
                                                @foreach ($coursiers as $coursier)
                                                    <option value="{{ $coursier->id }}">{{ $coursier->name }}</option>
                                                @endforeach
                                            @elseif (auth()->user()->hasRole('coursier'))
                                                <option value="{{ auth()->user()->coursier->id }}">{{ auth()->user()->coursier->name }}</option>
                                            @else
                                                <option value="">Aucun coursier associé</option>
                                            @endif
                                        </select>
                                        @error('selectedCoursiers')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="selectedColis">Colis</label>
                                        <select wire:model="selectedColis" class="form-control">
                                            <option value="">Sélectionner un colis</option>
                                            @foreach($colis as $colis)
                                                <option value="{{ $colis->id }}">{{ $colis->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedColis')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="selectedStatut">Statut</label>
                                        <select wire:model="selectedStatut" class="form-control">
                                            <option value="">Sélectionner un statut</option>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times"></i> Fermer
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Valider
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif



