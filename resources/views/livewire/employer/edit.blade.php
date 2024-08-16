
    <div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
        <div class="modal-dialog" style="top: 50px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #15a1e2; color: white;">
                    <h5 class="modal-title">Edition Employer</h5>
                </div>

                <form wire:submit.prevent="updateEmployer({{ $editEmployerid }})">
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

                                    <div class="form-group">
                                        <label for="editPost">Poste</label>
                                        <div class="col-md-12" wire:ignore>
                                            <input type="text" placeholder="Poste" wire:model="editPost"
                                                class="form-control @error('editPost') is-invalid @enderror"
                                                name="editPost">
                                            @error('editPost')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="editSalaire">Salaire</label>
                                        <div class="col-md-12" wire:ignore>
                                            <input type="decimal" placeholder="Salaire" wire:model="editSalaire"
                                                class="form-control @error('editSalaire') is-invalid @enderror"
                                                name="editSalaire">
                                            @error('editSalaire')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Valider
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

