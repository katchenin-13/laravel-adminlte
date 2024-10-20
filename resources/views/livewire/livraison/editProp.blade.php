{{-- @if ($request->user()->can('edit') || $request->user()->can('editc')){ --}}

       <div class="modal fade" id="editModalProp" style="z-index: 1900;" role="dialog" wire:ignore.self>
                <div class="modal-dialog modal-lg" style="left:100px;" >
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #15a1e2; color: white;">
                            <h5 class="modal-title" >Edition Livraison</h5>

                        </div>

                        <form role="form" wire:submit.prevent="updateLivraison({{$editLivraisonsid}})">
                            @csrf
                            <div class="modal-body">
                                <div class="d-flex my-1 bg-gray-light p-1">
                                    <div class="d-flex flex-grow-1 mr-2">
                                        <div class="flex-grow-1 mr-2">

                                            @if (session()->has('message'))
                                                <div class="alert alert-success ">
                                                    {{ session('message') }}
                                                </div>
                                            @endif

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">Destinataire
                                                            <input type="text" wire:model.defer="editDestinataireName"
                                                                class="form-control @error('editDestinataireName') is-invalid @enderror"/>
                                                            @error('editDestinataireName')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                                <div class="form-group">Adresse
                                                                        <input type="text" wire:keydown.enter=""
                                                                        class="form-control @error('editLivraisonsAdd') is-invalid @enderror"
                                                                        wire:model="editLivraisonsAdd"/>
                                                                    @error('editLivraisonsAdd')
                                                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                                    @enderror
                                                            </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                            <div class="form-group">Téléphone
                                                                        <input type="phone" wire:keydown.enter=""
                                                                        class="form-control @error('editLivraisonsPhone') is-invalid @enderror"
                                                                        wire:model="editLivraisonsPhone"/>
                                                                    @error('editLivraisonsPhone')
                                                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                                    @enderror
                                                            </div>
                                                    </div>

                                                </div>



                                                <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group"> Coursier:
                                                                <select id="selectedCoursiers" wire:model="selectedCoursiers" class="form-control">
                                                                    @if (auth()->user()->hasRole('superadmin') || auth()->user()->hasRole('manager'))
                                                                        @foreach ($coursiers as $coursier)
                                                                            <option value="{{ $coursier->id }}">{{ $coursier->nom }}</option>
                                                                        @endforeach
                                                                    @elseif (auth()->user()->hasRole('coursier'))
                                                                        <option value="{{ auth()->user()->coursier->id }}">{{ auth()->user()->coursier->nom }}</option>
                                                                    @else
                                                                        <option value="">Aucun coursier associé</option>
                                                                    @endif
                                                                </select>
                                                                @error('selectedCoursier')
                                                                <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                Colis de
                                                                <select id="selectedClient" wire:model="selectedClient" class="form-control">
                                                                    <option value="">Sélectionner le Client</option>
                                                                    @foreach($clients as $client)
                                                                        <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('selectedClient')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group"> Colis:
                                                        <select wire:model="selectedColis" class="form-control">
                                                            @foreach($colis as $colis)
                                                                <option value="{{ $colis->id }}">{{ $colis->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('selectedColis')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group"> Statut:
                                                                <select wire:model="selectedStatut" class="form-control">
                                                                    <option value="">Sélectionner un statut</option>
                                                                    @foreach($statuts as $statut)
                                                                        <option value="{{ $statut->id }}">{{ $statut->nom }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('selectedStatut')
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
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>

                                <button  type="submit"class="btn btn-success"><i class="fa fa-check"></i> Valider</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

        {{-- }& --}}
