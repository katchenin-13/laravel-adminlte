<div class="modal fade" id="ShowModalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="margin-top: 50px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Formulaire commune</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <!-- Champ de saisie pour le nom de la commune -->
                <div class="form-group">
                    <label for="communeName">Nom de la commune</label>
                    <input type="text" id="communeName" wire:keydown.enter="addNewCommune"
                           class="form-control @error('newCommuneName') is-invalid @enderror"
                           wire:model="newCommuneName" />
                    @error('newCommuneName')
                        <div class="invalid-feedback animate__animated animate__fadeInDown">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i> Fermer
                </button>
                <button class="btn btn-success" wire:click="addNewCommune">
                    <i class="fa fa-check"></i> Valider
                </button>
            </div>
        </div>
    </div>
</div>
