{{-- @if ($request->user()->can('read') || $request->user()->can('readc')){ --}}
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
                                            @if($selectedLivraison)
                                            <tr>
                                                <td><strong>Destinataire:</strong></td>
                                                <td>{{ $selectedLivraison->destinataire }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Adresse:</strong></td>
                                                <td>{{ $selectedLivraison->adresse_livraison }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Telephone:</strong></td>
                                                <td>{{ $selectedLivraison->numerodes }}</td>
                                            </tr>
                                            <tr>
                                                @if($selectedLivraison->coursier)
                                                    <td><strong>Coursier:</strong></td>
                                                    <td>{{ $selectedLivraison->coursier->nom }}</td>

                                                @endif
                                            </tr>
                                            <tr>
                                                @if($selectedLivraison->colis)
                                                    <td><strong>Colis:</strong></td>
                                                    <td>{{ $selectedLivraison->colis->nom }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($selectedLivraison->statut)
                                                    <td><strong>Statut:</strong></td>
                                                    <td>{{ $selectedLivraison->statut->nom }}</td>
                                                @endif
                                            </tr>
                                        {{-- @else
                                            <tr>
                                                <td colspan="2">Aucune information disponible pour cette livraison.</td>
                                            </tr> --}}
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
        {{-- } --}}
