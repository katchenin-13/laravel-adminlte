<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left: 100px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Édition le compte</h5>
            </div>

            <form role="form" wire:submit.prevent="updateCoursuser({{ $editCoursusersid }})">
                @csrf
                <div class="modal-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif




                    <div class="row">
                        <!-- Poste -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="selectedCoursier">Coursier</label>
                                <select id="selectedCoursier" wire:model="selectedCoursier" class="form-control">
                                    <option value="">Sélectionner un Coursier</option>
                                    @foreach($coursiers as $coursier)
                                        <option value="{{ $coursier->id }}">{{ $coursier->poste }}</option>
                                    @endforeach
                                </select>
                                @error('selectedCoursier')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Compte -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="selectedUser">Compte</label>
                                <select id="selectedUser" wire:model="selectedUser" class="form-control">
                                    <option value="">Sélectionner un compte</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectedUser')
                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
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
