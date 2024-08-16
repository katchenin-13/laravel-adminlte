<div wire:ignore.self class="modal fade" id="clientLivraisonsModal" tabindex="-1" aria-labelledby="clientLivraisonsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clientLivraisonsModalLabel">Livraisons du client {{ $selectedClient->nom ?? '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    @foreach($clientLivraisons as $livraison)
                        <li>{{ $livraison->description }} (ID: {{ $livraison->id }})</li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary">Payer</button>
            </div>
        </div>
    </div>
</div>
