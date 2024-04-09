<div class="modal fade" id="ShowModalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire commune</h5>

            </div>
            <div class="form-group" >
                <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="flex-grow-1 mr-2">

                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                    <!-- Champ de saisie pour le nom de la commune -->
                                    <div class="form-group" >Nom de la commune
                                        <input type="text" wire:keydown.enter="addNewCommune"
                                        class="form-control @error('newCommuneName') is-invalid @enderror"
                                        wire:model="newCommuneName" />
                                    @error('newCommuneName')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                    </div>



                            </div>      <!-- Autres éléments existants de la modal -->
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click="closeshowModal"><i class="fas fa-times"></i> Fermer</button>
                <button class="btn btn-success" wire:click="addNewCommune"> <i class="fa fa-check"></i> Valider</button>
            </div>
        </div>
    </div>
</div>
