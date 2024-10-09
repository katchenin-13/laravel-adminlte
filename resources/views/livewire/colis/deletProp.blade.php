@if(auth()->user()->hasRole('superadmin'))
     <div class="modal fade" id="DelectetModalProp" style="z-index: 1900;" role="dialog">
            <div class="modal-dialog" style="top:50px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation de suppression</h5>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer ce colis ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                        <button type="button" class="btn btn-danger" wire:click="deleteColis">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>

@endif


@if(auth()->user()->hasRole('coursier'))
     <div class="modal fade" id="DelectetModalProp" style="z-index: 1900;" role="dialog">
            <div class="modal-dialog" style="top:50px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation de suppression</h5>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer ce colis ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                        <button type="button" class="btn btn-danger" wire:click="deleteColis">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>

@endif


