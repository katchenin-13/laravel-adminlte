
    <div class="modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #15a1e2; color: white;">
                    <h5 class="modal-title" id="createUserModalLabel" >Nouveau Utilisateur</h5>
                </div>
                <div class="modal-body">
                    <!-- Form for creating a new user -->
                    <form action="{{ route('store') }}" method="Post">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name" class=" text-gray" style="color: #007bff;">Nom:</label>
                            <input type="text"  class="form-control" id="name" placeholder="Entrez un nom" name="name">
                        </div>




                        <div class="form-group mb-3">
                            <label for="email" style="color: #007bff;">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        </div>

                        <div class="form-group mb-3">

                            <label for="password" style="color: #007bff;">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Entrez un mot de passe" name="password">

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <i class="fas fa-times"></i> Fermer
                              </button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Valider</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



</form>


