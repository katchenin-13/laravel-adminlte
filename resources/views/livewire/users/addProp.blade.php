
<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:30px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire User</h5>
            </div>
            <form wire:submit.prevent="addNewUser">
                <div class="modal-body">
                        <div class="d-flex my-4 bg-gray-light p-3">
                            <div class="d-flex flex-grow-1 mr-2">
                                <div class="flex-grow-1 mr-2">

                                            @if (session()->has('message'))
                                                <div class="alert alert-success">
                                                    {{ session('message') }}
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                <label for="newUserName">Nom</label>
                                                <input type="text" class="form-control @error('newUserName') is-invalid @enderror"
                                                    wire:model.defer="newUserName" />
                                                @error('newUserName')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="newUserEmail">Email</label>
                                                <input type="email" class="form-control @error('newUserEmail') is-invalid @enderror"
                                                    wire:model.defer="newUserEmail" />
                                                @error('newUserEmail')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="newUserPassword">Password</label>
                                                <input type="password" class="form-control @error('newUserPassword') is-invalid @enderror"
                                                    wire:model.defer="newUserPassword" />
                                                @error('newUserPassword')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="role">Sélectionner un rôle</label>
                                                <select id="role" wire:model.defer="selectedRole" class="form-control">
                                                    <option value="">Sélectionner un rôle</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                        @endforeach
                                                </select>
                                                @error('selectedRole')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>


