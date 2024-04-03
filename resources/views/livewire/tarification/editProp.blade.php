<div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title" >Edition Tarif</h5>

            </div>

            <form role="form" wire:submit.prevent="updateTarification({{$editTarificationId}})">
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

                        <div class="form-group">Tarification
                           <div class="col-md-12" wire:ignore>
                                    <input type="decimal" placeholder="Prix" wire:keypress.enter=""
                                    wire:model="editTarificationPrix" class="form-control @error("editTarificationPrix")
                                    is-invalid @enderror" name ="editTarificationPrix">
                                @error("editTarificationPrix")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                           </div>
                        </div>
                        <div class="form-group" wire:ignore>
                            Catégorie
                            <div class="col-md-12">
                                <select wire:model="selectedCategorie" class="form-control">
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                    @endforeach
                                </select>
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
