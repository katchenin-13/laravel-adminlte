@if(auth()->user()->hasRole('superadmin'))
    <div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left:100px;">
        <div class="modal-content">
            {{-- En-tête du modal --}}
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Edit Colis</h5>
            </div>

            {{-- Corps du modal --}}
            <div class="modal-body">
                <div class="d-flex my-4 bg-gray-light p-3">
                    <div class="flex-grow-1 mr-2">

                        {{-- Message de succès --}}
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        {{-- Formulaire de colis --}}
                        <div class="row">
                            <div class="col-md-12">

                                {{-- Champ Nom --}}
                                <div class="form-group">
                                    <label for="editColisName">Nom</label>
                                    <input type="text" wire:keydown.enter=""
                                        class="form-control @error('editColisName') is-invalid @enderror"
                                        wire:model="editColisName" />
                                    @error('editColisName')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Champ Quantité --}}
                                <div class="form-group">
                                    <label for="editColisQuan">Quantité</label>
                                    <input type="number" wire:keydown.enter=""
                                        class="form-control @error('editColisQuan') is-invalid @enderror"
                                        wire:model="editColisQuan" />
                                    @error('editColisQuan')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Champ Catégorie --}}
                                <div class="form-group">
                                    <label>Catégorie</label>
                                    <select wire:model="selectedCategorie" class="form-control">
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedCategorie')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Champ Client --}}
                                <div class="form-group">
                                    <label>Colis de</label>
                                    <select wire:model="selectedClient" class="form-control">
                                        <option value="">Sélectionner un client</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedClient')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Champ Coursier --}}
                                <div class="form-group">
                                    <label for="selectedCoursier">Coursier</label>
                                    <select id="selectedCoursier" wire:model="selectedCoursier" class="form-control">
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
                                    @error('selectedCoursier')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Champ Description --}}
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

            {{-- Pied du modal --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i> Fermer
                </button>
                <button class="btn btn-success" wire:click="addNewColis">
                    <i class="fa fa-check"></i> Valider
                </button>
            </div>
        </div>
    </div>
    </div>
@endif

@if(auth()->user()->hasRole('coursier'))

    <div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-lg" style="left:100px;">
            <div class="modal-content">
                {{-- En-tête du modal --}}
                <div class="modal-header" style="background-color: #15a1e2; color: white;">
                    <h5 class="modal-title">Edit Colis</h5>
                </div>

                {{-- Corps du modal --}}
                <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="flex-grow-1 mr-2">

                            {{-- Message de succès --}}
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            {{-- Formulaire de colis --}}
                            <div class="row">
                                <div class="col-md-12">

                                    {{-- Champ Nom --}}
                                    <div class="form-group">
                                        <label for="editColisName">Nom</label>
                                        <input type="text" wire:keydown.enter=""
                                            class="form-control @error('editColisName') is-invalid @enderror"
                                            wire:model="editColisName" />
                                        @error('editColisName')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Champ Quantité --}}
                                    <div class="form-group">
                                        <label for="editColisQuan">Quantité</label>
                                        <input type="number" wire:keydown.enter=""
                                            class="form-control @error('editColisQuan') is-invalid @enderror"
                                            wire:model="editColisQuan" />
                                        @error('editColisQuan')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Champ Catégorie --}}
                                    <div class="form-group">
                                        <label>Catégorie</label>
                                        <select wire:model="selectedCategorie" class="form-control">
                                            <option value="">Sélectionner une catégorie</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedCategorie')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Champ Client --}}
                                    <div class="form-group">
                                        <label>Colis de</label>
                                        <select wire:model="selectedClient" class="form-control">
                                            <option value="">Sélectionner un client</option>
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedClient')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Champ Coursier --}}
                                    <div class="form-group">
                                        <label for="selectedCoursier">Coursier</label>
                                        <select id="selectedCoursier" wire:model="selectedCoursier" class="form-control">
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
                                        @error('selectedCoursier')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Champ Description --}}
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


                {{-- Pied du modal --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times"></i> Fermer
                    </button>
                    <button class="btn btn-success" wire:click="addNewColis">
                        <i class="fa fa-check"></i> Valider
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
