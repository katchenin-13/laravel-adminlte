{{-- if ($request->user()->can('edit')) {
    if ($request->user()->can('editc')) { --}}

       <div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
                <div class="modal-dialog modal-lg" style="left: 100px;">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #15a1e2; color: white;">
                            <h5 class="modal-title" >Edition Colis</h5>
                        </div>

                        <form role="form" wire:submit.prevent="updateColis({{ $editColisid }})">
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
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="editColisName">Nom</label>
                                                        <input type="text" wire:keydown.enter=""
                                                            class="form-control @error('editColisName') is-invalid @enderror"
                                                            wire:model="editColisName" />
                                                        @error('editColisName')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="editColisQuan">Quantité</label>
                                                        <input type="integer" wire:keydown.enter=""
                                                            class="form-control @error('editColisQuan') is-invalid @enderror"
                                                            wire:model="editColisQuan" />
                                                        @error('editColisQuan')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="selectedCategorie">Catégorie</label>
                                                        <select wire:model="selectedCategorie" class="form-control">
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
                                                                <select wire:model="selectedClient" class="form-control">
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
                                                        <label for="editColisDes">Description</label>
                                                        <input type="text" wire:keydown.enter=""
                                                            class="form-control @error('editColisDes') is-invalid @enderror"
                                                            wire:model="editColisDes" />
                                                        @error('editColisDes')
                                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Valider</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
