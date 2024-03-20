<div class="modal fade" id="ModalShow" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Détails de la commune</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Nom de la commune : {{ $selectedCommune }}</p>
            <!-- Affichez d'autres détails de la commune ici si nécessaire -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
    </div>
</div>
