<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top: 50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Édition Manager</h5>
            </div>

            <form wire:submit.prevent="updateEmployer({{ $editmanagerId }})">
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
                                            Nom
                                            <input type="text" placeholder="Nom" wire:model="editnom"
                                                   class="form-control @error('editnom') is-invalid @enderror"
                                                   name="editnom">
                                            @error('editnom')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           Prénom
                                            <input type="text" placeholder="Prénom" wire:model="editprenom"
                                                   class="form-control @error('editprenom') is-invalid @enderror"
                                                   name="editprenom">
                                            @error('editprenom')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            Numéro de téléphone
                                            <input type="phone" placeholder="Téléphone" wire:model="editphone"
                                                   class="form-control @error('editphone') is-invalid @enderror"
                                                   name="editphone">
                                            @error('editphone')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          Numéro de téléphone 2
                                            <input type="phone" placeholder="Téléphone 2" wire:model="editphone2"
                                                   class="form-control @error('editphone2') is-invalid @enderror"
                                                   name="editphone2">
                                            @error('editphone2')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            Catégorie
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
                                            Email
                                            <input type="email" placeholder="Email" wire:model="editemail"
                                                   class="form-control @error('editemail') is-invalid @enderror"
                                                   name="editemail">
                                            @error('editemail')
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