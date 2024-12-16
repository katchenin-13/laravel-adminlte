
<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1">
                    <i class="fa fa-list fa-2x"></i> Paiement des factures
                    {{-- <a class="btn btn-link text-white mr-4 d-block" wire:click="show">
                        <i class="fas fa-users"></i> Compte Managers
                    </a> --}}
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
                                <th style="width:20%;" class="text-center">livraison du mois</th>
                                <th style="width:30%;" class="text-center">Total Factures</th>
                                <th style="width:50%;" class="text-center">payer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientsData as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->uuid }}</td>
                                <td class="text-center">{{ $item->nom }} </td>
                                <td class="text-center">{{ $item->nombre_livraisons }}</td>
                                <td class="text-center">{{ number_format($item->tarification_total, 2) }} XOF</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" wire:click="showPropC({{$item->id}})">
                                        <i class="fas fa-file-invoice-dollar"></i>
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
                    {{ $paiements->links() }}
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->
