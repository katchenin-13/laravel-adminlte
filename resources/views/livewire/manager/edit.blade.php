<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left:100px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Édition Manager</h5>
            </div>

            <form wire:submit.prevent="updateManager({{ $editManagerId }})">
                @csrf
                <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="flex-grow-1 mr-2">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <label> Nom</label>
                                            <input type="text" placeholder="Nom" wire:model="editNom"
                                                   class="form-control @error('editNom') is-invalid @enderror"
                                                   name="editNom">
                                            @error('editnom')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <label>Prénom</label>
                                            <input type="text" placeholder="Prénom" wire:model="editPrenom"
                                                   class="form-control @error('editPrenom') is-invalid @enderror"
                                                   name="editPrenom">
                                            @error('editPrenom')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Numéro de téléphone</label>
                                            <input type="editPhone" placeholder="Téléphone" wire:model="editPhone"
                                                   class="form-control @error('editphone') is-invalid @enderror"
                                                   name="editPhone">
                                            @error('editPhone')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Numéro de téléphone 2</label>
                                            <input type="editPhone2" placeholder="Téléphone 2" wire:model="editPhone2"
                                                   class="form-control @error('editphone2') is-invalid @enderror"
                                                   name="editPhone2">
                                            @error('editPhone2')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Type d'employé<label>
                                            <select wire:model="selectedEmployer" class="form-control">
                                                <option value="">Sélectionner une catégorie</option>
                                                @foreach($employers as $employer)
                                                    <option value="{{ $employer->id }}">{{ $employer->poste }}</option>
                                                @endforeach
                                            </select>
                                            @error('selectedEmployer')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="editEmail" placeholder="Email" wire:model="editEmail"
                                                   class="form-control @error('editEmail') is-invalid @enderror"
                                                   name="editEmail">
                                            @error('editEmail')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Valider
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
