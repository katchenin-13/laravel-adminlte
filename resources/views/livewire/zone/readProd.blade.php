<div class="modal fade" id="readmodalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Détails Zone</h5>
            </div>
            <div class="form-group">
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                             @if($selectedZone && $selectedZone->commune)
                                <tr>
                                    <td><strong>Zone :</strong></td>
                                    <td>{{ $selectedZone->nom }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Commune :</strong></td>
                                    <td>{{ $selectedZone->commune->nom }}</td>
                                </tr>

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click="closereadModal"><i class="fas fa-times"></i> Fermer</button>
            </div>
        </div>
    </div>
</div>
