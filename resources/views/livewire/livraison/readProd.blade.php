<div class="modal fade" id="createProp" tabindex="-1" role="dialog" wire:ignore.self>
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
                                @if($selectedLivraison && $selectedLivraison->coursier && $selectedLivraison->colis && $selectedLivraison->statut)
                                <tr>
                                    <td><strong>Destinataire:</strong></td>
                                    <td>{{ $selectedLivraison ->Destinataire }}</td>
                                </tr>


                                <tr>
                                    <td><strong>Adresse:</strong></td>
                                    <td>{{ $selectedCoursiers->adresse_livraison}}</td>
                                </tr>

                                <tr>
                                    <td><strong>Telephone:</strong></td>
                                    <td>{{ $selectedCoursiers->numerodes }}</td>
                                </tr>

                                <tr>
                                    <td><strong>coursier:</strong></td>
                                    <td>{{ $selectedCoursiers->coursier->nom }}</td>
                                </tr>

                                 <tr>
                                    <td><strong>Vehicule:</strong></td>
                                    <td>{{ $selectedCoursiers->colis->nom }}</td>
                                </tr> 

                                <tr>
                                    <td><strong>Statut:</strong></td>
                                    <td>{{ $selectedCoursiers->statut->nom }}</td>
                                </tr> 

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click="closeModal"><i class="fas fa-times"></i> Fermer</button>
            </div>
        </div>
    </div>
</div>
