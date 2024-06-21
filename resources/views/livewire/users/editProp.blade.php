@can('edit')
    <div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
        <div class="modal-dialog" style="top: 50px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #15a1e2; color: white;">
                    <h5 class="modal-title">Edition User</h5>
                </div>

                <form wire:submit.prevent="updateUser({{ $editUserid }})">
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

                                    <div class="form-group">
                                        <label for="editUserName">Nom</label>
                                        <div class="col-md-12" wire:ignore>
                                            <input type="text" placeholder="Nom" wire:model="editUserName"
                                                class="form-control @error('editUserName') is-invalid @enderror"
                                                name="editUserName">
                                            @error('editUserName')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="editUserGmail">Email</label>
                                        <div class="col-md-12" wire:ignore>
                                            <input type="email" placeholder="Email" wire:model="editUserGmail"
                                                class="form-control @error('editUserGmail') is-invalid @enderror"
                                                name="editUserGmail">
                                            @error('editUserGmail')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="editUserPassword">Password</label>
                                        <div class="col-md-12" wire:ignore>
                                            <input type="password" placeholder="Password" wire:model="editUserPassword"
                                                class="form-control @error('editUserPassword') is-invalid @enderror"
                                                name="editUserPassword">
                                            @error('editUserPassword')
                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    @can('assignRole')
                                        <div class="form-group">
                                            <label for="editRole">Rôle</label>
                                            <div class="col-md-12" wire:ignore>
                                                <select wire:model="editRole"
                                                    class="form-control @error('editRole') is-invalid @enderror"
                                                    name="editRole">
                                                    <option value="">Sélectionner un rôle</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('editRole')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endcan

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" wire:click="closeEditModal">
                            <i class="fas fa-times"></i> Fermer
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Valider
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endcan
