<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire Client</h5>

            </div>
            <div class="form-group" >
                <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="flex-grow-1 mr-2">

                                    <!-- Champ de saisie pour le nom du client -->
                                    <div class="form-group">Nom
                                            <input type="text" wire:keydown.enter="addNewClient"
                                            class="form-control @error('newClientName') is-invalid @enderror"
                                            wire:model="newClientName" />
                                        @error('newClientName')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">Prenom
                                            <input type="text" wire:keydown.enter="addNewClient"
                                            class="form-control @error('newClientPrenom') is-invalid @enderror"
                                            wire:model="newClientPrenom" />
                                        @error('newClientEmail')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                   </div>

                                   <div class="form-group">Téléphone
                                            <input type="phone" wire:keydown.enter="addNewClient"
                                            class="form-control @error('newClientPhone') is-invalid @enderror"
                                            wire:model="newClientPhone" />
                                        @error('newClientPhone')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                  </div>

                                  <div class="form-group">Email
                                        <input type="email" wire:keydown.enter="addNewClient"
                                        class="form-control @error('newClientEmail') is-invalid @enderror"
                                        wire:model="newClientEmail" />
                                    @error('newClientEmail')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                 </div>

                                 <div class="form-group">Secteur d'activité
                                            <input type="text" wire:keydown.enter="addNewClient"
                                            class="form-control @error('newClientSecteur') is-invalid @enderror"
                                            wire:model="newClientSecteur" />
                                        @error('newClientSecteur')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror

                                 </div>

                                 <div class="form-group">
                                    Zone:
                                    <select wire:model="selectedZone" class="form-control">
                                        <option value="">Sélectionner une zone</option>
                                        @foreach($zones as $zone)
                                            <option value="{{ $zone->id }}">{{ $zone->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedZone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                    @if (session()->has('message'))
                                        <div class="alert alert-success ">
                                            {{ session('message') }}
                                        </div>
                                    @endif

                            </div>      <!-- Autres éléments existants de la modal -->
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click="closeModal"><i class="fas fa-times"></i> Fermer</button>
                <button class="btn btn-success" wire:click="addNewClient"> <i class="fa fa-check"></i> Valider</button>
            </div>
        </div>
    </div>
</div>


