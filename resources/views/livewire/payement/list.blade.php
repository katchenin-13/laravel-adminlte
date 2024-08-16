<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1">
                    <i class="fa fa-list fa-2x"></i> Paiement des factures
                </h3>

                <div class="card-tools d-flex align-items-center">
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" wire:model="search" class="form-control float-right" placeholder="Rechercher">
                        <div class="input-group-append">
                            <button class="btn btn-default" wire:click="$refresh"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:10%;">No</th>
                                <th style="width:20%;" class="text-center">ID</th>
                                <th style="width:20%;" class="text-center">Client</th>
                                {{-- <th style="width:20%;" class="text-center">Colis</th> --}}
                                <th style="width:30%;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->uuid }}</td>
                                <td class="text-center">{{ $item->nom}}</td> <!-- Assurez-vous que vous avez une relation 'client' définie et qu'elle a un attribut 'name' -->
                                {{-- <td class="text-center">{{ $item->livraison->colis }}</td> <!-- Assurez-vous que vous avez une relation 'livraison' définie et qu'elle a un attribut 'colis' --> --}}
                                <td class="text-center">
                                    <button class="btn btn-danger btn-sm" wire:click="showClientLivraisons({{ $item->id }})">
                                        <div class="">Payer</div>
                                    </button>

                                    <button class="btn btn-primary btn-sm" wire:click="showPropD({{ $item->id }})">
                                        <div class="">Detail</div>
                                    </button>
                                    <button class="btn btn-primary btn-sm" wire:click="showPropD({{ $item->id }})">
                                        <div class="">?</div>
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    {{ $payements->links() }}
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col-12 -->
</div>
