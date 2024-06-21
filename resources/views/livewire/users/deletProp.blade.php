{{-- @if ($request->user()->can('delet')) --}}
@can('delet')
<div class="modal fade" id="DelectetModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:10px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Confirmation de suppression</h5>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" wire:click="deleteUser">Supprimer</button>
            </div>
        </div>
    </div>
</div>
@endcan
