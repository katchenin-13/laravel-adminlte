<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left:100px;" >
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title" >Edition Coursier</h5>

            </div>

            <form role="form" wire:submit.prevent="updateCoursier({{$editCoursiersid}})">
                 @csrf
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
                                                        <input type="text" wire:keydown.enter=""
                                                        class="form-control @error('editCoursiersName') is-invalid @enderror"
                                                        wire:model="editCoursiersName"/>
                                                    @error('editCoursiersName')
                                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                                    <div class="form-group">Prenom
                                                            <input type="text" wire:keydown.enter=""
                                                            class="form-control @error('editCoursiersPrenom') is-invalid @enderror"
                                                            wire:model="editCoursiersPrenom"/>
                                                        @error('editCoursiersPrenom')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                                <div class="form-group">Téléphone
                                                            <input type="phone" wire:keydown.enter=""
                                                            class="form-control @error('editCoursiersPhone1') is-invalid @enderror"
                                                            wire:model="editCoursiersPhone1"/>
                                                        @error('editCoursiersPhone1')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group">Téléphone 2
                                                            <input type="phone" wire:keydown.enter=""
                                                            class="form-control @error('editCoursiersPhone2') is-invalid @enderror"
                                                            wire:model="editCoursiersPhone2"/>
                                                        @error('editCoursiersPhone2')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                                <div class="form-group">Email
                                                        <input type="email" wire:keydown.enter=""
                                                        class="form-control @error('editCoursiersEmail') is-invalid @enderror"
                                                        wire:model="editCoursiersEmail"/>
                                                    @error('editCoursiersEmail')
                                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">numéro de permis
                                                        <input type="text" wire:keydown.enter=""
                                                        class="form-control @error('editCoursiersNump') is-invalid @enderror"
                                                        wire:model="editCoursiersNump"/>
                                                    @error('editCoursiersNump')
                                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group">Cni
                                                            <input type="text" wire:keydown.enter= ""
                                                            class="form-control @error('editCoursiersCni') is-invalid @enderror"
                                                            wire:model="editCoursiersCni" />
                                                        @error('editCoursiersCni')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                                <div class="form-group">Photo
                                                        <input type="text" wire:keydown.enter= ""
                                                        class="form-control @error('editCoursiersPhoto') is-invalid @enderror"
                                                        wire:model="editCoursiersPhoto" />
                                                    @error('editCoursiersPhoto')
                                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">Salaire
                                                    <input type="decimal" wire:keydown.enter= ""
                                                    class="form-control @error('editCoursiersSal') is-invalid @enderror"
                                                    wire:model="editCoursiersSal" />
                                                @error('editCoursiersSal')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                            <div class="col-md-4">
                                                    <div class="form-group">Plaque d'immatriculation
                                                            <input type="text" wire:keydown.enter= ""
                                                            class="form-control @error('editCoursiersPlaq ') is-invalid @enderror"
                                                            wire:model="editCoursiersPlaq" />
                                                        @error('editCoursiersPlaq')
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


                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="closeEditModal"><i class="fas fa-times"></i> Fermer</button>

                    <button  type="submit"class="btn btn-success"><i class="fa fa-check"></i> Valider</button>

                </div>
            </form>

        </div>
    </div>
</div>
