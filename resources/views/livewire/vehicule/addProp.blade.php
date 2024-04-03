<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire Vehicule</h5>

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


                                    <div class="form-group">Type de vehicule
                                            <input type="text" wire:keydown.enter="addNewVehicule"
                                            class="form-control @error('newVehiculeName') is-invalid @enderror"
                                            wire:model="newVehiculeName" />
                                        @error('newVehiculeName')
                                            <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                        @enderror
                                    </div>



                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click="closeModal"><i class="fas fa-times"></i> Fermer</button>
                <button class="btn btn-success" wire:click="addNewVehicule"> <i class="fa fa-check"></i> Valider</button>
            </div>
        </div>
    </div>
</div>
