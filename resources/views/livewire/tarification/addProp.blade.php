<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" style="margin-top: 50px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalLabel">Formulaire Tarif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="flex-grow-1 mr-2">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <!-- Champ de saisie pour le prix -->
                            <div class="form-group">
                                <label for="tarificationPrix">Prix</label>
                                <input type="number" id="tarificationPrix" wire:keydown.enter="addNewTarification"
                                    class="form-control @error('newTarificationPrix') is-invalid @enderror"
                                    wire:model="newTarificationPrix" />
                                @error('newTarificationPrix')
                                    <div class="invalid-feedback animate__animated animate__fadeInDown">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sélecteur de catégorie -->
                            <div class="form-group">
                                <label for="categorieSelect">Catégorie</label>
                                <select id="categorieSelect" wire:model="selectedCategorie" class="form-control">
                                    <option value="">Sélectionner une Catégorie</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                    @endforeach
                                </select>
                                @error('selectedCategorie')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i> Fermer
                </button>
                <button type="button" class="btn btn-success" wire:click="addNewTarification">
                    <i class="fa fa-check"></i> Valider
                </button>
            </div>
        </div>
    </div>
</div>
