 <div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
     <div class="modal-dialog modal-lg" style="left:100px;">
         <div class="modal-content">
             <div class="modal-header" style="background-color: #15a1e2; color: white;">
                 <h5 class="modal-title">Edition Client</h5>

             </div>

             <form role="form" wire:submit.prevent="updateClient({{ $editClientid }})">
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
                                <!-- Champ de saisie pour le nom du client -->
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">Nom
                                                    <input type="text" wire:keydown.enter=""
                                                    class="form-control @error('editClientName') is-invalid @enderror"
                                                    wire:model="editClientName" />
                                                @error('editClientName')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>

                                    </div>
                                    <div class="col-md-6">
                                                <div class="form-group">Prenom
                                                        <input type="text" wire:keydown.enter=""
                                                        class="form-control @error('editClientPrenom') is-invalid @enderror"
                                                        wire:model="editClientPrenom" />
                                                    @error('editClientPrenom')
                                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">Téléphone
                                                        <input type="phone" wire:keydown.enter=""
                                                        class="form-control @error('editClientPhone') is-invalid @enderror"
                                                        wire:model="editClientPhone" />
                                                    @error('editClientPhone')
                                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                    </div>

                                    <div class="col-md-6">
                                            <div class="form-group">Email
                                                    <input type="email" wire:keydown.enter=""
                                                    class="form-control @error('editClientEmail') is-invalid @enderror"
                                                    wire:model="editClientEmail" />
                                                @error('editClientEmail')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">Secteur d'activité
                                                    <input type="text" wire:keydown.enter=""
                                                    class="form-control @error('editClientSecteur') is-invalid @enderror"
                                                    wire:model="editClientSecteur" />
                                                @error('editClientSecteur')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror

                                        </div>
                                    </div>

                                       <div class="col-md-6">
                                            <div class="form-group"> Zone:
                                                <select wire:model="selectedZone" class="form-control">
                                                    <option value="">Sélectionner une zone</option>
                                                    @foreach($zones as $zone)
                                                        <option value="{{ $zone->id }}">{{ $zone->nom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('selectedZone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                       </div>
                                </div>

                               

                        </div>
                         </div>
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-danger" wire:click="closeEditModal"><i
                             class="fas fa-times"></i> Fermer</button>

                     <button type="submit"class="btn btn-success"><i class="fa fa-check"></i> Valider</button>

                 </div>
             </form>

         </div>
     </div>
 </div>
