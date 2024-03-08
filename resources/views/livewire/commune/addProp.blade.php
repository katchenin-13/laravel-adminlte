<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Formulaire Commune</h5>

            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <!-- Champ de saisie pour le nom de la commune -->
                    <div class="form-group">Nom de la commune
                        <input type="text" wire:keydown.enter="addNewCommune"
                        class="form-control @error('newCommuneName') is-invalid @enderror"
                        wire:model="newCommuneName" />
                    @error('newCommuneName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <!-- Autres éléments existants de la modal -->
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click="closeModal">Fermer</button>
                <button class="btn btn-link" wire:click="addNewCommune"> <i class="fa fa-check"></i> Valider</button>
            </div>
        </div>
    </div>
</div>
