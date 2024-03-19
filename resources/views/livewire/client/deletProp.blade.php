<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog">
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation de suppression</h5>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette Categorie ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" wire:click="deleteCategorie">Supprimer</button>
            </div>
        </div>
    </div>
</div>
