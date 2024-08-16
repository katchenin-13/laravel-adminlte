
    <div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
        <div class="modal-dialog" style="top: 50px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #15a1e2; color: white;">
                    <h5 class="modal-title">Édition User</h5>
                </div>

                <form wire:submit.prevent="updateUser({{ $editUserid }})">
                    @csrf
                    <div class="modal-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="editUserName">Nom</label>
                            <input type="text" placeholder="Nom" wire:model="editUserName"
                                class="form-control @error('editUserName') is-invalid @enderror"
                                name="editUserName">
                            @error('editUserName')
                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="editUserEmail">Email</label>
                            <input type="email" placeholder="Email" wire:model="editUserEmail"
                                class="form-control @error('editUserEmail') is-invalid @enderror"
                                name="editUserEmail">
                            @error('editUserEmail')
                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="editUserPassword">Password</label>
                            <input type="password" placeholder="Password" wire:model="editUserPassword"
                                class="form-control @error('editUserPassword') is-invalid @enderror"
                                name="editUserPassword">
                            @error('editUserPassword')
                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- @can('Role') --}}
                            <div class="form-group">
                                <label for="editRole">Rôle</label>
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
                        {{-- @endcan --}}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
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

