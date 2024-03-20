<div class="modal fade" id="ModalEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel{{$item->id}}" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title" id="editUserModalLabel{{$item->id}}">Modifier l'utilisateur {{$item->name}}</h5>
            </div>
            <div class="modal-body">
                <!-- Formulaire d'édition de l'utilisateur -->
                <form action="{{ route('update', $item->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name" class=" text-gray" style="color: #007bff;">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email" class=" text-gray" style="color: #007bff;">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$item->email}}">
                    </div>
                    <div class="form-group">
                        <label for="password" class=" text-gray" style="color: #007bff;">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{$item->password}}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i> Fermer
                          </button>
                          <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
