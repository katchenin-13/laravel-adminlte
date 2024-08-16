<div class="modal fade" id="readmodalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Détails Zone</h5>
            </div>
            <div class="form-group">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                @if($selectedClient && $selectedClient->zone)
                                <tr>
                                    <td><strong>Nom:</strong></td>
                                    <td>{{ $selectedClient->nom }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Prenom:</strong></td>
                                    <td>{{ $selectedClient->prenom }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Telephone:</strong></td>
                                    <td>{{ $selectedClient->telephone }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $selectedClient->email }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Secteur d'activé:</strong></td>
                                    <td>{{ $selectedClient->secteuract }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Zone:</strong></td>
                                    <td>{{ $selectedClient->zone->nom }}</td>
                                </tr>

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
            </div>
        </div>
    </div>
</div>
