<div class="row p-4 pt-5">
          <div class="col-12">
            <div class="card ">
              <div class="card-header  d-flex align-items-center text-white"  style="background-color: #64350d !important;">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des domaines</h3>

                <div class="card-tools d-flex align-items-center ">
                <a class="btn btn-link text-white mr-4 d-block" wire:click="toggleShowAddCategorieForm"><i class="fas fa-user-plus"></i> Nouveau domaine</a>
                  <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Search">

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
                      <th style="width:50%;">Domaine</th>
                      <th style="width:20%;" class="text-center">Ajouté</th>
                      <th style="width:30%;" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @if ($isAddCategorie)
                            <tr>
                                <td colspan="2">
                                    <input type="text"
                                    wire:keydown.enter="addNewCategorie"
                                    class="form-control @error('newCategorieName') is-invalid @enderror"
                                    wire:model="newCategorieName" />
                                    @error('newCategorieName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-link" wire:click="addNewCategorie"> <i class="fa fa-check"></i> Valider</button>
                                    <button class="btn btn-link" wire:click="toggleShowAddCategorieForm"> <i class="far fa-trash-alt"></i> Annuler</button>
                                </td>
                            </tr>
                        @endif
                        @foreach ($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->titre }}</td>
                                <td class="text-center">{{ optional($categorie->created_at)->diffForHumans() }}</td>
                                <td class="text-center">
                                    <button class="btn btn-link" wire:click="editCategorie({{$categorie->id}})"> <i class="far fa-edit"></i> </button>

                                     {{-- <button class="btn btn-link" wire:click="showProp({{$categorie->id}})"> <i class="fa fa-list"></i> propriétés</button> --}}
                                     <button class="btn btn-link" wire:click="confirmDelete('{{$categorie->tire}}', {{$categorie->id}})"> <i class="far fa-trash-alt"></i> </button>
                                    {{-- @if(count($categorie->categories) == 0)
                                    <button class="btn btn-link" wire:click="confirmDelete('{{$categorie->tire}}', {{$categorie->id}})"> <i class="far fa-trash-alt"></i> </button>
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
                    {{ $categories->links() }}
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
    </div>
