<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left:100px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex my-4 bg-gray-light p-3">
                    <div class="d-flex flex-grow-1 mr-2">
                       <div class="flex-grow-1 mr-2">
                                        <div class="container">
                                            @if (session()->has('message'))
                                                <div class="alert alert-success">
                                                    {{ session('message') }}
                                                </div>
                                            @endif

                                            <form>
                                                <!-- Champ de saisie pour le nom du client -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="clientName">Nom</label>
                                                            <input type="text" id="clientName" wire:keydown.enter="addNewClient"
                                                                class="form-control @error('newClientName') is-invalid @enderror"
                                                                wire:model="newClientName" />
                                                            @error('newClientName')
                                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="clientPrenom">Prénom</label>
                                                            <input type="text" id="clientPrenom" wire:keydown.enter="addNewClient"
                                                                class="form-control @error('newClientPrenom') is-invalid @enderror"
                                                                wire:model="newClientPrenom" />
                                                            @error('newClientPrenom')
                                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="clientPhone">Téléphone</label>
                                                            <input type="tel" id="clientPhone" wire:keydown.enter="addNewClient"
                                                                class="form-control @error('newClientPhone') is-invalid @enderror"
                                                                wire:model="newClientPhone" />
                                                            @error('newClientPhone')
                                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="clientEmail">Email</label>
                                                            <input type="email" id="clientEmail" wire:keydown.enter="addNewClient"
                                                                class="form-control @error('newClientEmail') is-invalid @enderror"
                                                                wire:model="newClientEmail" />
                                                            @error('newClientEmail')
                                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="clientSecteur">Secteur d'activité</label>
                                                            <input type="text" id="clientSecteur" wire:keydown.enter="addNewClient"
                                                                class="form-control @error('newClientSecteur') is-invalid @enderror"
                                                                wire:model="newClientSecteur" />
                                                            @error('newClientSecteur')
                                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="selectedZone">Zone</label>
                                                            <select id="selectedZone" wire:model="selectedZone" class="form-control">
                                                                <option value="">Sélectionner une zone</option>
                                                                @foreach($zones as $zone)
                                                                    <option value="{{ $zone->id }}">{{ $zone->nom }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('selectedZone')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                        </div>
                       </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                <button type="button" class="btn btn-success" wire:click="addNewClient"> <i class="fa fa-check"></i> Valider</button>
            </div>
        </div>
    </div>
</div>
