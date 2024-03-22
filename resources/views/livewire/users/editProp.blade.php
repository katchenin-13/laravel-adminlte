<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title" >Edition User </h5>

            </div>

            <form role="form" wire:submit.prevent="updateUser({{$editUserid}})">
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

                        <div class="form-group">Nom
                           <div class="col-md-12" wire:ignore>
                                    <input type="text" placeholder="Nom" wire:keypress.enter=""
                                    wire:model="editUserName" class="form-control @error(" editUserName")
                                    is-invalid @enderror" name ="editUserName">
                                @error('editUserName')
                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                @enderror
                           </div>
                        </div>


                        <div class="form-group">Email
                            <div class="col-md-12" wire:ignore>
                                <input type="email" placeholder="email" wire:keypress.enter=""
                                    wire:model="editUserGmail"
                                    class="form-control @error('editUserGmail') is-invalid @enderror"
                                    name="editUserGmail">
                                @error('editUserGmail')
                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group">Password
                            <div class="col-md-12" wire:ignore>
                                     <input type="password" placeholder="Nom" wire:keypress.enter=""
                                     wire:model="editUserPassword" class="form-control @error(" editUserPassword")
                                     is-invalid @enderror" name ="editUserPassword">
                                 @error('editUserPassword')
                                     <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                 @enderror
                            </div>
                         </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="closeEditModal"><i class="fas fa-times"></i> Fermer</button>

                    <button  type="submit"class="btn btn-success"><i class="fa fa-check"></i> Valider</button>

                </div>
            </form>

        </div>
    </div>
</div>
