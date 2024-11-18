
<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" aria-labelledby="PayerModalLabel" aria-describedby="PayerModalDescription" wire:ignore.self>
    <div class="modal-dialog" style="left: 50px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5>test Modal</h5>
            </div>
            <div class="modal-body" id="modalProp">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="d-flex my-4 bg-gray-light p-3">
                    <div class="d-flex flex-grow-1 mr-2">
                        <div class="flex-grow-1 mr-2">
                            <div class="form-group">
                                <h2>Cinetpay</h2>
                            </div>
                            <!-- Add input fields here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i> Fermer
                </button>
                <button class="btn btn-success" wire:click="enregistrerPaiement" wire:loading.attr="disabled">
                    <i class="fa fa-check"></i> Valider
                    <span wire:loading wire:target="enregistrerPaiement" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
</div>


