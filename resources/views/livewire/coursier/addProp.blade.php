<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left:100px;" >
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire Coursier</h5>

            </div>
            <div class="form-group" >
                <div class="modal-body">
                    <div class="d-flex my-1 bg-gray-light p-1">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="flex-grow-1 mr-2">

                                @if (session()->has('message'))
                                    <div class="alert alert-success ">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                    <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group">Nom
                                                        <input type="text" wire:keydown.enter="addNewCoursier"
                                                        class="form-control @error('newCoursiersName') is-invalid @enderror"
                                                        wire:model="newCoursiersName" />
                                                    @error('newCoursiersName')
                                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                                    <div class="form-group">Prenom
                                                            <input type="text" wire:keydown.enter="addNewCoursier"
                                                            class="form-control @error('newCoursiersPrenom') is-invalid @enderror"
                                                            wire:model="newCoursiersPrenom" />
                                                        @error('newCoursiersPrenom')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                                <div class="form-group">Téléphone
                                                            <input type="phone" wire:keydown.enter="addNewCoursier"
                                                            class="form-control @error('newCoursiersPhone') is-invalid @enderror"
                                                            wire:model="newCoursiersPhone" />
                                                        @error('newCoursiersPhone')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group">Téléphone 2
                                                            <input type="phone" wire:keydown.enter="addNewCoursier"
                                                            class="form-control @error('newCoursiersPhone2') is-invalid @enderror"
                                                            wire:model="newCoursiersPhone2" />
                                                        @error('newCoursiersPhone2')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                                <div class="form-group">Email
                                                        <input type="email" wire:keydown.enter="addNewCoursier"
                                                        class="form-control @error('newCoursiersEmail') is-invalid @enderror"
                                                        wire:model="newCoursiersEmail" />
                                                    @error('newCoursiersEmail')
                                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">numéro de permis
                                                        <input type="text" wire:keydown.enter="addNewCoursier"
                                                        class="form-control @error('newCoursiersNump') is-invalid @enderror"
                                                        wire:model="newCoursiersNump" />
                                                    @error('newCoursiersNump')
                                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group">Cni
                                                            <input type="text" wire:keydown.enter="addNewCoursier"
                                                            class="form-control @error('newCoursiersCni') is-invalid @enderror"
                                                            wire:model="newCoursiersCni" />
                                                        @error('newCoursiersCni')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                                <div class="form-group">Photo
                                                        <input type="text" wire:keydown.enter="addNewCoursier"
                                                        class="form-control @error('newCoursiersPhoto') is-invalid @enderror"
                                                        wire:model="newCoursiersPhoto" />
                                                    @error('newCoursiersPhoto')
                                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">Salaire
                                                    <input type="decimal" wire:keydown.enter="addNewCoursier"
                                                    class="form-control @error('newCoursiersSal') is-invalid @enderror"
                                                    wire:model="newCoursiersSal" />
                                                @error('newCoursiersSal')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                            <div class="col-md-4">
                                                    <div class="form-group">Plaque d'immatriculation
                                                            <input type="text" wire:keydown.enter="addNewCoursier"
                                                            class="form-control @error('newCoursiersPlaq ') is-invalid @enderror"
                                                            wire:model="newCoursiersPlaq" />
                                                        @error('newCoursiersPlaq')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group"> Type de vehicule:
                                                    <select wire:model="selectedVehicule" class="form-control">
                                                        <option value="">Sélectionner une vehicule</option>
                                                        @foreach($vehicules as $vehicule)
                                                            <option value="{{ $vehicule->id }}">{{ $vehicule->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('selectedVehicule')
                                                      <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group"> Zone:
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
                                            </div>
                                        </div>


                            </div>      <!-- Autres éléments existants de la modal -->
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click="closeModal"><i class="fas fa-times"></i> Fermer</button>
                <button class="btn btn-success" wire:click="addNewCoursier"> <i class="fa fa-check"></i> Valider</button>
            </div>
        </div>
    </div>
</div>


