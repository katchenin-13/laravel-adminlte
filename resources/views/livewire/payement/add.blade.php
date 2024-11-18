<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top: 50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Procédure de paiement pour {{ $selectedClient }}</h5>
            </div>
            <div class="modal-body">
                @if (session()->has('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="d-flex my-4 bg-gray-light p-3">
                    <div class="flex-grow-1 mr-2">
                        <div class="form-group">
                            <label for="montant">Montant</label>
                            <input type="number" wire:keydown.enter="montant"
                                   class="form-control @error('montant') is-invalid @enderror"
                                   wire:model="montant" placeholder="{{ $tarification_total }} XOF"/>
                            @error('montant')
                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mois">Mois</label>
                                    <select wire:model="mois" class="form-control @error('mois') is-invalid @enderror">
                                        <option value="" disabled>Sélectionner un mois</option>
                                        @foreach(range(1, 12) as $month)
                                            <option value="{{ str_pad($month, 2, '0', STR_PAD_LEFT) }}">
                                                {{ \Carbon\Carbon::create()->month($month)->locale('fr')->translatedFormat('F') }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('mois')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="année">Année</label>
                                    <input type="number" wire:keydown.enter="Année"
                                           class="form-control @error('année') is-invalid @enderror"
                                           wire:model="année" placeholder="Année" min="2020" max="{{ date('Y') }}"/>
                                    @error('année')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-success btn-block mb-2">
                    <i class="fas fa-mobile-alt"></i> Autre méthode 
                </button>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times"></i> Fermer
                    </button>
                    <button class="btn btn-success" wire:click="newPaiement">
                        <i class="fa fa-check"></i> Valider
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
