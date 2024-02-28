<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des Commune</h3>

                <div class="card-tools d-flex align-items-center ">
                    <a class="btn btn-link text-white mr-4 d-block" wire:click="toggleShowAddCommuneForm"><i
                            class="fas fa-user-plus"></i> Nouveau type d'article</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" wire:model.debounce.250ms="search"
                            class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                <table class="table table-head-fixed">
                    <thead>
                        <tr>
                            <th style="width:50%;">Commune</th>
                            <th style="width:20%;" class="text-center">Ajouté</th>
                            <th style="width:30%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($isAddCommune)
                        <tr>
                            <td colspan="2">
                                <input type="text" wire:keydown.enter="addNewCommune"
                                    class="form-control @error('newCommuneName') is-invalid @enderror"
                                    wire:model="newCommuneName" />
                                @error('newCommuneName')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td class="text-center">
                                <button class="btn btn-link" wire:click="addNewCommune"> <i class="fa fa-check"></i>
                                    Valider</button>
                                <button class="btn btn-link" wire:click="toggleShowAddCommuneForm"> <i
                                        class="far fa-trash-alt"></i> Annuler</button>
                            </td>
                        </tr>
                        @endif
                        @foreach ($comnunes as $comnune)
                        <tr>
                            <td>{{ $comnune->nom }}</td>
                            <td class="text-center">{{ optional($comnune->created_at)->diffForHumans() }}</td>
                            <td class="text-center">
                                <button class="btn btn-link" wire:click="showProp({{$comnune->id}})"> <i
                                        class="far fa-edit"></i> </button>

                                <button class="btn btn-link" wire:click="showProp({{$comnune->id}})"> <i
                                        class="fa fa-list"></i> propriétés</button>

                                {{-- @if(count($comnune->articles) == 0)
                                <button class="btn btn-link"
                                    wire:click="confirmDelete('{{$comnune->nom}}', {{$comnune->id}})"> <i
                                        class="far fa-trash-alt"></i> </button>
                                @endif --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    {{ $comnunes->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>