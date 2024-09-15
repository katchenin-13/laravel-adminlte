<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire Statut</h5>

            </div>
            <div class="form-group" >
                <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="flex-grow-1 mr-2">

                                @if (session()->has('message'))
                                    <div class="alert alert-success ">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                    <!-- Champ de saisie pour le nom de la Categorie -->
                                    <div class="form-group">Statut
                                            <input type="text" wire:keydown.enter="addNewStatut"
                                            class="form-control @error('newStatutName') is-invalid @enderror"
                                            wire:model="newStatutName" />
                                        @error('newStatutName')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">statut type
                                        <input type="text" wire:keydown.enter="addNewStatut"
                                        class="form-control @error('statutType') is-invalid @enderror"
                                        wire:model="statutType" />
                                    @error('statutType')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>



                            </div>      <!-- Autres éléments existants de la modal -->
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                <button class="btn btn-success" wire:click="addNewStatut"> <i class="fa fa-check"></i> Valider</button>
            </div>
        </div>
    </div>
</div>
