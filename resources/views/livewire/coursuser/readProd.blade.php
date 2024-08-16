<div class="modal fade" id="readmodalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Détails du Compte</h5>
            </div>
            <div class="form-group">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                @if($selectedCoursusers && $selectedCoursusers->coursier && $selectedCoursusers->user)

                                <tr>
                                    <td><strong>Coursier:</strong></td>
                                    <td>{{ $selectedCoursusers->coursier->nom }}</td>
                                </tr>

                                <tr>
                                    <td><strong>User:</strong></td>
                                    <td>{{ $selectedCoursusers->user->name }}</td>
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
