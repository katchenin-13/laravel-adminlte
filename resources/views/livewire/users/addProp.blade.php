@can('add')
    <div class="modal fade" id="modalProp" style="z-index: 1900;" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog" style="top:30px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #15a1e2; color: white;">
                    <h5 class="modal-title">Formulaire User</h5>
                </div>
                <form wire:submit.prevent="addNewUser">
                    <div class="modal-body">
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
                            <input type="password"
                                class="form-control @error('newUserPassword') is-invalid @enderror"
                                wire:model.defer="newUserPassword" />
                            @error('newUserPassword')
                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">Rôle</label>
                            <select class="form-control" id="role" wire:model.defer="role">
                                <option value="">Sélectionnez un rôle</option>
                                <option value="superadmin">Superadmin</option>
                                <option value="admin">Admin</option>
                                <option value="coursier">Coursier</option>
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" wire:click="closeModal"><i class="fas fa-times"></i> Fermer</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcan
