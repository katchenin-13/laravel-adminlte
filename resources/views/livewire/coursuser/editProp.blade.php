
<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Édition le compte</h5>
            </div>

            <form role="form" wire:submit.prevent="updateCoursuser({{$editCoursusersid}})">
                 @csrf
                <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                         <div class="flex-grow-1 mr-2">

                            @if (session()->has('message'))
                                <div class="alert alert-success ">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="selectedCoursiers">Coursier</label>
                                <select id="selectedCoursiers" wire:model="selectedCoursiers" class="form-control">
                                    <option value="">Sélectionner un Coursier</option>
                                    @foreach($coursiers as $coursier)
                                        <option value="{{ $coursier->id }}">{{ $coursier->nom }}</option>
                                    @endforeach
                                </select>
                                @error('selectedCoursiers')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="selectedUser">user</label>
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>

                    <button  type="submit"class="btn btn-success"><i class="fa fa-check"></i> Valider</button>

                </div>
            </form>

        </div>
    </div>
</div>
