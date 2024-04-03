{{-- <div class="modal fade" id="createProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Details Commune</h5>

            </div>
            <div class="form-group" >
                <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="modal-body">
                                <p>Commune : {{ $selectedCommune->nom}}</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click=""><i class="fas fa-times"></i> Fermer</button>
            </div>
        </div>
    </div>
</div>

 --}}

 <div class="modal fade" id="createProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Details Commune</h5>
            </div>
            <div class="form-group">
                <div class="table-responsive">
                    <div class="modal-body">
                            <table class="table table-bordered">
                                <tbody>
                                    @if($selectedCommune)
                                        <tr>
                                            <td><strong>Commune :</strong></td>
                                            <td>{{ $selectedCommune->nom }}</td>
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

