<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" style="margin-top: 50px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalLabel">Formulaire Catégorie</h5>
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

                                <!-- Champ de saisie pour le nom de la Catégorie -->
                                <div class="form-group">
                                    <label for="categorieName">Catégorie</label>
                                    <input type="text" id="categorieName" wire:keydown.enter="addNewCategorie"
                                        class="form-control @error('newCategorieName') is-invalid @enderror"
                                        wire:model="newCategorieName" />
                                    @error('newCategorieName')
                                        <div class="invalid-feedback animate__animated animate__fadeInDown">{{ $message }}</div>
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
                <button type="button" class="btn btn-success" wire:click="addNewCategorie">
                    <i class="fa fa-check"></i> Valider
                </button>
            </div>
        </div>
    </div>
</div>
