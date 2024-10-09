<!-- resources/views/livewire/coursiers-list.blade.php -->

<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1">
                    <i class="fa fa-list fa-2x"></i> Liste des Comptes
                </h3>
                <div class="card-tools d-flex align-items-center">
                    <a class="btn btn-link text-white mr-4" wire:click="showProp">
                        <i class="fas fa-truck"></i> <i class="fas fa-users"></i> Compte Coursiers
                    </a>
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
                                <th style="width:10%;" class="text-center">ID</th>
                                <th style="width:10%;" class="text-center">Coursier</th>
                                <th style="width:20%;" class="text-center">User</th>
                                <th style="width:30%;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coursusers as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->uuid }}</td>
                                    <td class="text-center">
                                        {{ $item->coursier->nom ?? 'N/A' }}
                                    </td>
                                    <td class="text-center">
                                        {{ $item->user->name ?? 'N/A' }}
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm" wire:click="showPropE({{ $item->id }})">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm" wire:click="showPropC({{ $item->id }})">
                                            <i class="far fa-eye"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" wire:click="showPropD({{ $item->id }})">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="float-right">
                    {{ $coursusers->links() }}
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col-12 -->
</div>
