@if(auth()->user()->hasRole('superadmin'))
        <div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
            <div class="modal-dialog" style="top:50px;">
                <div class="modal-content">

                    <div class="modal-header" style="background-color: #15a1e2; color: white;">
                        <h5 class="modal-title">Édition Colis</h5>
                    </div>
                    <form role="form" wire:submit.prevent="updateColis({{ $editColisid }})">
                        @csrf
                        <div class="modal-body">
                            <div class="d-flex my-4 bg-gray-light p-3">
                                <div class="flex-grow-1 mr-2">

                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="editColisName">Nom</label>
                                        <input type="text" wire:keydown.enter=""
                                            class="form-control @error('editColisName') is-invalid @enderror"
                                            wire:model="editColisName" />
                                        @error('editColisName')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="editColisQuan">Quantité</label>
                                        <input type="number" wire:keydown.enter=""
                                            class="form-control @error('editColisQuan') is-invalid @enderror"
                                            wire:model="editColisQuan" />
                                        @error('editColisQuan')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="selectedCategorie">Catégorie</label>
                                        <select wire:model="selectedCategorie" class="form-control">
                                            <option value="">Sélectionner une catégorie</option>
                                            @foreach($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedCategorie')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="selectedClient">Colis de</label>
                                        <select wire:model="selectedClient" class="form-control">
                                            <option value="">Sélectionner un client</option>
                                            @foreach($clients as $client)
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
                                        <select wire:model="selectedCoursier" class="form-control">
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
                                        @error('selectedCoursier')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>

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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endif

 @if(auth()->user()->hasRole('coursier'))
        <div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
            <div class="modal-dialog" style="top:50px;">
                <div class="modal-content">

                    <div class="modal-header" style="background-color: #15a1e2; color: white;">
                        <h5 class="modal-title">Édition Colis</h5>
                    </div>
                    <form role="form" wire:submit.prevent="updateColis({{ $editColisid }})">
                        @csrf
                        <div class="modal-body">
                            <div class="d-flex my-4 bg-gray-light p-3">
                                <div class="flex-grow-1 mr-2">

                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="editColisName">Nom</label>
                                        <input type="text" wire:keydown.enter=""
                                            class="form-control @error('editColisName') is-invalid @enderror"
                                            wire:model="editColisName" />
                                        @error('editColisName')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="editColisQuan">Quantité</label>
                                        <input type="number" wire:keydown.enter=""
                                            class="form-control @error('editColisQuan') is-invalid @enderror"
                                            wire:model="editColisQuan" />
                                        @error('editColisQuan')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="selectedCategorie">Catégorie</label>
                                        <select wire:model="selectedCategorie" class="form-control">
                                            <option value="">Sélectionner une catégorie</option>
                                            @foreach($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedCategorie')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="selectedClient">Colis de</label>
                                        <select wire:model="selectedClient" class="form-control">
                                            <option value="">Sélectionner un client</option>
                                            @foreach($clients as $client)
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
                                        <select wire:model="selectedCoursier" class="form-control">
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
                                        @error('selectedCoursier')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>

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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endif

