
<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title" >Edition Statut</h5>

            </div>

            <form role="form" wire:submit.prevent="updateStatut({{$editStatutid}})">
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

                                <div class="form-group">Statut
                                        {{-- <div class="col-md-12" wire:ignore> --}}
                                                    <input type="text" placeholder="Statut" wire:keypress.enter=""
                                                    wire:model="editStatutName" class="form-control @error("editStatutName")
                                                    is-invalid @enderror" name ="editStatutName">
                                                @error("editStatutName")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                          {{-- </div> --}}
                                </div>


                                <div class="form-group">statut type
                                    {{-- <div class="col-md-12" wire:ignore> --}}
                                                <input type="text" placeholder="Statut" wire:keypress.enter=""
                                                wire:model="statutType" class="form-control @error("statutType")
                                                is-invalid @enderror" name ="statutType">
                                            @error("statutType")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                      {{-- </div> --}}
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
