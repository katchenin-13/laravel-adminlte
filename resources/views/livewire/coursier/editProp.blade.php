<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left: 100px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Édition Coursier</h5>
            </div>

            <form role="form" wire:submit.prevent="updateCoursier({{ $editCoursiersid }})">
                @csrf
                <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                           <div class="flex-grow-1 mr-2">
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                     @endif

                                    <div class="row">
                                        <!-- Nom -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="editCoursiersName">Nom</label>
                                                <input type="text" id="editCoursiersName" wire:keydown.enter=""
                                                    class="form-control @error('editCoursiersName') is-invalid @enderror"
                                                    wire:model="editCoursiersName"/>
                                                @error('editCoursiersName')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Prénom -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="editCoursierPrenom">Prénom</label>
                                                <input type="text" id="editCoursierPrenom" wire:keydown.enter=""
                                                    class="form-control @error('editCoursierPrenom') is-invalid @enderror"
                                                    wire:model="editCoursierPrenom"/>
                                                @error('editCoursierPrenom')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Téléphone -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="editCoursiersPhone1">Téléphone</label>
                                                <input type="tel" id="editCoursiersPhone1" wire:keydown.enter=""
                                                    class="form-control @error('editCoursiersPhone1') is-invalid @enderror"
                                                    wire:model="editCoursiersPhone1"/>
                                                @error('editCoursiersPhone1')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Email -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="editCoursiersEmail">Email</label>
                                                <input type="email" id="editCoursiersEmail" wire:keydown.enter=""
                                                    class="form-control @error('editCoursiersEmail') is-invalid @enderror"
                                                    wire:model="editCoursiersEmail"/>
                                                @error('editCoursiersEmail')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Numéro de permis -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="editCoursiersNump">Numéro de permis</label>
                                                <input type="text" id="editCoursiersNump" wire:keydown.enter=""
                                                    class="form-control @error('editCoursiersNump') is-invalid @enderror"
                                                    wire:model="editCoursiersNump"/>
                                                @error('editCoursiersNump')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- CNI -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="editCoursiersCni">CNI</label>
                                                <input type="text" id="editCoursiersCni" wire:keydown.enter=""
                                                    class="form-control @error('editCoursiersCni') is-invalid @enderror"
                                                    wire:model="editCoursiersCni"/>
                                                @error('editCoursiersCni')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Plaque d'immatriculation -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="editCoursiersPlaq">Plaque d'immatriculation</label>
                                                <input type="text" id="editCoursiersPlaq" wire:keydown.enter=""
                                                    class="form-control @error('editCoursiersPlaq') is-invalid @enderror"
                                                    wire:model="editCoursiersPlaq"/>
                                                @error('editCoursiersPlaq')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Zone -->
                                        <div class="col-md-4">
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

                                        <!-- Type de véhicule -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="selectedVehicule">Type de véhicule</label>
                                                <select id="selectedVehicule" wire:model="selectedVehicule" class="form-control">
                                                    <option value="">Sélectionner un véhicule</option>
                                                    @foreach($vehicules as $vehicule)
                                                        <option value="{{ $vehicule->id }}">{{ $vehicule->nom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('selectedVehicule')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Poste -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="selectedEmployer">Poste</label>
                                                <select id="selectedEmployer" wire:model="selectedEmployer" class="form-control">
                                                    <option value="">Sélectionner un poste</option>
                                                    @foreach($employers as $employer)
                                                        <option value="{{ $employer->id }}">{{ $employer->poste }}</option>
                                                    @endforeach
                                                </select>
                                                @error('selectedEmployer')
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
