{{-- @can('add') --}}
<div class="modal fade" id="modalProp" style="z-index: 1900;" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:30px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire User</h5>
            </div>
            <h2>Détails du Client</h2>
            <p>Nom du Client : {{ $selectedClient }}</p>
            <p>Tarification Totale : {{ $tarification_total }}</p>
            <button @click="open = false">Fermer</button>
            <h1>Emma</h1>

        </div>
    </div>
</div>
{{-- @endcan --}}

