<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edition propriété </h5>

            </div>

            <form role="form" wire:submit.prevent="updateCommune({{$editCommuneid}})">
                 @csrf
                <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="flex-grow-1 mr-2">
                                 {{-- <!-- Champ de saisie pour le nom de la commune -->
                        <div class="form-group">Nom de la commune
                            <input type="text" wire:keydown.enter="addNewCommune"
                            class="form-control @error('newCommuneName') is-invalid @enderror"
                            wire:model="newCommuneName" />
                        @error('newCommuneName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <!-- Autres éléments existants de la modal --> --}}
                        <div class="form-group">Nom de la commune
                           <div class="col-md-12" wire:ignore>
                                    <input type="text" placeholder="Nom" wire:keypress.enter=""
                                    wire:model="editCommuneName" class="form-control @error(" editCommuneName")
                                    is-invalid @enderror" name ="editCommuneName">
                                @error("editCommuneName")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                           </div>
                        </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="closeEditModal">Fermer</button>

                    <button  type="submit"class="btn btn-success">Valider</button>

                </div>
            </form>

        </div>
    </div>
</div>
