@if ($loading)
    <div class="loading-overlay">
        <div class="spinner-border text-primary" role="status"> <span class="sr-only">Chargement en cours...</span> </div>
    </div>
    @endif <div class="row p-4 pt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-primary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1"> <i class="fa fa-list fa-2x"></i> Liste des Clients </h3>
                    <div class="card-tools d-flex align-items-center"> <a class="btn btn-link text-white mr-4 d-block"
                            wire:click="showProp"> <i class="fas fa-user"></i> Nouveau Client </a>
                        <div class="input-group input-group-md" style="width: 250px;"> <input type="text"
                                name="table_search" wire:model.debounce.300ms="search" class="form-control float-right"
                                placeholder="Rechercher">
                            <div class="input-group-append"> <button type="submit" class="btn btn-default"
                                    wire:click="search"><i class="fas fa-search"></i></button> </div>
                        </div>
                    </div>
                </div> <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10%;">No</th>
                                    <th style="width:15%;" class="text-center">ID</th>
                                    <th style="width:15%;" class="text-center">Nom</th>
                                    <th style="width:15%;" class="text-center">Prenom</th>
                                    <th style="width:15%;" class="text-center">Téléphone</th>
                                    <th style="width:15%;" class="text-center">Gmail</th>
                                    <th style="width:30%;" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $item->uuid }}</td>
                                        <td class="text-center">{{ $item->nom }}</td>
                                        <td class="text-center">{{ $item->prenom }}</td>
                                        <td class="text-center">{{ $item->telephone }}</td>
                                        <td class="text-center">{{ $item->email }}</td>
                                        <td class="text-center"> <button class="btn btn-primary btn-sm"
                                                wire:click="showPropE({{ $item->id }})"> <i class="far fa-edit"></i>
                                            </button> <button class="btn btn-info btn-sm"
                                                wire:click="showPropC({{ $item->id }})"> <i class="far fa-eye"></i>
                                            </button> <button class="btn btn-danger btn-sm"
                                                wire:click="showPropD({{ $item->id }})"> <i
                                                    class="far fa-trash-alt"></i> </button> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- /.table-responsive -->
                </div> <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right"> {{ $clients->links() }} </div>
                </div> <!-- /.card-footer -->
            </div> <!-- /.card -->
        </div> <!-- /.col-12 -->
    </div> @push('styles')
        <style>
            .loading-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(255, 255, 255, 0.5);
                /* Fond semi-transparent */
                z-index: 9999;
                /* Assure que l'overlay est au-dessus du contenu */
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .loading-overlay .spinner-border {
                width: 3rem;
                height: 3rem;
            }
        </style>
    @endpush
