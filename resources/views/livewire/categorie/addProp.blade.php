<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire Catégorie</h5>

            </div>
            <div class="form-group" >
                <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="flex-grow-1 mr-2">

                                    <!-- Champ de saisie pour le nom de la Categorie -->
                                    <div class="form-group"><h3>Catégorie</h3>
                                            <input type="text" wire:keydown.enter="addNewCategorie"
                                            class="form-control @error('newCategorieName') is-invalid @enderror"
                                            wire:model="newCategorieName" />
                                        @error('newCategorieName')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
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
                <button class="btn btn-success" wire:click="addNewCategorie"> <i class="fa fa-check"></i> Valider</button>
            </div>
        </div>
    </div>
</div>
