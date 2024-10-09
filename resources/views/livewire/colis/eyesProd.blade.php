 @Role('superadmin')
        <div class="modal fade" id="eyesmodal" tabindex="-1" role="dialog" wire:ignore.self>
            <div class="modal-dialog" style="top:50px;">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #15a1e2; color: white;">
                        <h5 class="modal-title">Détails colis</h5>
                    </div>
                    <div class="form-group">
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        @if($selectedColis)
                                        <tr>
                                            <td><strong>Destinataire :</strong></td>
                                            <td>{{ $selectedColis->nom }}</td>
                                        </tr>

                                        <tr>
                                            <td><strong>Quantité :</strong></td>
                                            <td>{{ $selectedColis->quantite }}</td>
                                        </tr>

                                        <tr>
                                            <td><strong>Client :</strong></td>
                                            <td>{{ $selectedColis->client->nom }}</td>
                                        </tr>

                                        <tr>
                                            @if ($selectedColis->categorie)
                                            <td><strong>Catégorie :</strong></td>
                                            <td>{{ $selectedColis->categorie->nom }}
                                            @endif
                                        </td>
                                        </tr>

                                        <tr>
                                            @if ($selectedColis->coursier)
                                            <td><strong>Coursier :</strong></td>
                                            <td>{{ $selectedColis->coursier->nom }}
                                            @endif
                                        </td>
                                        </tr>

                                        <tr>
                                            <td><strong>Description :</strong></td>
                                            <td>{{ $selectedColis->description }}</td>
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
 @endRole

 @Role('coursier')
 <div class="modal fade" id="eyesmodal" tabindex="-1" role="dialog" wire:ignore.self>
     <div class="modal-dialog" style="top:50px;">
         <div class="modal-content">
             <div class="modal-header" style="background-color: #15a1e2; color: white;">
                 <h5 class="modal-title">Détails colis</h5>
             </div>
             <div class="form-group">
                 <div class="modal-body">
                     <div class="table-responsive">
                         <table class="table table-bordered">
                             <tbody>
                                 @if($selectedColis)
                                 <tr>
                                     <td><strong>Destinataire :</strong></td>
                                     <td>{{ $selectedColis->nom }}</td>
                                 </tr>

                                 <tr>
                                     <td><strong>Quantité :</strong></td>
                                     <td>{{ $selectedColis->quantite }}</td>
                                 </tr>

                                 <tr>
                                     <td><strong>Client :</strong></td>
                                     <td>{{ $selectedColis->client->nom }}</td>
                                 </tr>

                                 <tr>
                                     @if ($selectedColis->categorie)
                                     <td><strong>Catégorie :</strong></td>
                                     <td>{{ $selectedColis->categorie->nom }}
                                     @endif
                                 </td>
                                 </tr>

                                 <tr>
                                     @if ($selectedColis->coursier)
                                     <td><strong>Coursier :</strong></td>
                                     <td>{{ $selectedColis->coursier->nom }}
                                     @endif
                                 </td>
                                 </tr>

                                 <tr>
                                     <td><strong>Description :</strong></td>
                                     <td>{{ $selectedColis->description }}</td>
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
@endRole

