<div class="modal fade" id="readmodalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Détails User</h5>
            </div>
            <div class="modal-body">
                @if($selectedUser)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>Nom:</strong></td>
                                    <td>{{ $selectedUser->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $selectedUser->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Rôle:</strong></td>
                                    <td>{{ $selectedUser->getRoleNames()->implode(', ') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Permissions:</strong></td>
                                    <td>{{ $selectedUser->getAllPermissions()->pluck('name')->implode(', ') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Aucun utilisateur sélectionné.</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
            </div>
        </div>
    </div>
</div>
