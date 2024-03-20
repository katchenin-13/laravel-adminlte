<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1">
                    <i class="fa fa-list fa-2x"></i> Liste des Communes
                </h3>

                <div class="card-tools d-flex align-items-center">
                    <a class="btn btn-link text-white mr-4 d-block" wire:click="showProp">
                        <i class="fas fa-building"></i> Nouvelle Commune
                    </a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" wire:model.debounce.300ms="search"
                            class="form-control float-right" placeholder="Rechercher">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
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
                                <th style="width:20%;" class="text-center">Commune</th>
                                <th style="width:30%;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($communes as $item)
                            <tr>
                                {{-- <td>{{ $commune->id}}</td> --}}
                                <td>{{ $loop->iteration}}</td>
                                <td class="text-center">{{ $item->nom}}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary mr-2" wire:click="showPropE({{$item->id}})">
                                        <i class="far fa-edit"></i>
                                    </button>

                                    <button class="btn btn-info mr-2" wire:click="showPropS({{ $item->id }})">
                                        <i class="far fa-eye"></i>
                                    </button>

                                    <button class="btn btn-danger" wire:click="showPropD({{$item->id}})">
                                        <i class="far fa-trash-alt"></i>
                                    </button>

                                    {{-- <button class="btn btn-link" wire:click="showPropE('{{$item->id}})">
                                        <i class="far fa-trash-alt"></i>
                                    </button> --}}
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
                    {{ $communes->links() }}
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col-12 -->
</div>
