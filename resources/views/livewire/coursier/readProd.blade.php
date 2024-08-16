<div class="modal fade" id="readmodalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Détails Coursiers</h5>
            </div>
            <div class="form-group">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                @if($selectedCoursiers && $selectedCoursiers->vehicule && $selectedCoursiers->zone && $selectedCoursiers->employer && $selectedCoursiers->user)
                                <tr>
                                    <td><strong>Nom:</strong></td>
                                    <td>{{ $selectedCoursiers ->nom }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Prenom:</strong></td>
                                    <td>{{ $selectedCoursiers ->prenom }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Telephone:</strong></td>
                                    <td>{{ $selectedCoursiers->numero_telephone }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Numero permis:</strong></td>
                                    <td>{{ $selectedCoursiers->numero_permis_conduire }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Plaque immatriculation:</strong></td>
                                    <td>{{ $selectedCoursiers->plaque_immatriculation }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Cni:</strong></td>
                                    <td>{{ $selectedCoursiers->cni }}</td>
                                </tr>


                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $selectedCoursiers->email }}</td>
                                </tr>

                                 <tr>
                                    <td><strong>Vehicule:</strong></td>
                                    <td>{{ $selectedCoursiers->vehicule->nom }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Zone:</strong></td>
                                    <td>{{ $selectedCoursiers->zone->nom }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Poste:</strong></td>
                                    <td>{{ $selectedCoursiers->employer->poste }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Compte:</strong></td>
                                    <td>{{ $selectedCoursiers->user->name }}</td>
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
