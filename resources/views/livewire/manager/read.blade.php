<div class="modal fade" id="readmodalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Détails Employer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            @if($selectedManager  && $selectedManager->employer)
                                <tr>
                                    <td><strong>Nom:</strong></td>
                                    <td>{{ $selectedManager->nom }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Prénom:</strong></td>
                                    <td>{{ $selectedManager->prenom }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Téléphone:</strong></td>
                                    <td>{{ $selectedManager->phone }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Téléphone 2:</strong></td>
                                    <td>{{ $selectedManager->phone2 }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $selectedManager->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Catégorie employeur:</strong></td>
                                    <td>{{ $selectedManager->employer->poste }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="2" class="text-center">Aucun manager sélectionné</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
            </div>
        </div>
    </div>
</div>