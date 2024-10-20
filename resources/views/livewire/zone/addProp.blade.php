<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="margin-top: 50px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Formulaire Zone</h5>
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

                <!-- Champ de saisie pour le nom de la Zone -->
                <div class="form-group">
                    <label for="zoneName">Zone</label>
                    <input type="text" id="zoneName" wire:keydown.enter="addNewZone"
                           class="form-control @error('newZoneName') is-invalid @enderror"
                           wire:model="newZoneName" />
                    @error('newZoneName')
                        <div class="invalid-feedback animate__animated animate__fadeInDown">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sélecteur de commune -->
                <div class="form-group">
                    <label for="communeSelect">Commune</label>
                    <select id="communeSelect" wire:model="selectedCommune" class="form-control">
                        <option value="">Sélectionner une commune</option>
                        @foreach($communes as $commune)
                            <option value="{{ $commune->id }}">{{ $commune->nom }}</option>
                        @endforeach
                    </select>
                    @error('selectedCommune')
                       <div class="invalid-feedback animate__animated animate__fadeInDown">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i> Fermer
                </button>
                <button class="btn btn-success" wire:click="addNewZone">
                    <i class="fa fa-check"></i> Valider
                </button>
            </div>
        </div>
    </div>
</div>
