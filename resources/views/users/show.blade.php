<div class="modal fade" id="ModalShow{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="showUserModalLabel{{$item->id}}" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title" id="showUserModalLabel{{$item->id}}">Détails de l'utilisateur {{$item->name}}</h5>
            </div>
            <div class="modal-body">
                <!-- Affichage des détails de l'utilisateur -->
                <p><strong>Nom:</strong> {{$item->name}}</p>
                <p><strong>Email:</strong> {{$item->email}}</p>
                <!-- Ajoutez ici d'autres détails de l'utilisateur si nécessaire -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i> Fermer
                  </button>
            </div>
        </div>


    </div>
</div>
