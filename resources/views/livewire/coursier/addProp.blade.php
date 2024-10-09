<div class="modal fade" id="modalProp" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-lg" style="left:100px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire Coursier</h5>
            </div>
            <div class="modal-body">
                <div class="d-flex my-4 bg-gray-light p-3">
                    <div class="d-flex flex-grow-1 mr-2">
                       <div class="flex-grow-1 mr-2">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <form>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="newCoursiersName">Nom</label>
                                                <input type="text" id="newCoursiersName" wire:keydown.enter="addNewCoursier"
                                                    class="form-control @error('newCoursiersName') is-invalid @enderror"
                                                    wire:model="newCoursiersName" />
                                                @error('newCoursiersName')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="newCoursiersPrenom">Prénom</label>
                                                <input type="text" id="newCoursiersPrenom" wire:keydown.enter="addNewCoursier"
                                                    class="form-control @error('newCoursiersPrenom') is-invalid @enderror"
                                                    wire:model="newCoursiersPrenom" />
                                                @error('newCoursiersPrenom')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="newCoursiersPhone">Téléphone</label>
                                                <input type="text" id="newCoursiersPhone" wire:keydown.enter="addNewCoursier"
                                                    class="form-control @error('newCoursiersPhone') is-invalid @enderror"
                                                    wire:model="newCoursiersPhone" />
                                                @error('newCoursiersPhone')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="newCoursiersEmail">Email</label>
                                                <input type="email" id="newCoursiersEmail" wire:keydown.enter="addNewCoursier"
                                                    class="form-control @error('newCoursiersEmail') is-invalid @enderror"
                                                    wire:model="newCoursiersEmail" />
                                                @error('newCoursiersEmail')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="newCoursiersCni">CNI</label>
                                                <input type="text" id="newCoursiersCni" wire:keydown.enter="addNewCoursier"
                                                    class="form-control @error('newCoursiersCni') is-invalid @enderror"
                                                    wire:model="newCoursiersCni" />
                                                @error('newCoursiersCni')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="newCoursiersNump">Numéro de permis</label>
                                                <input type="text" id="newCoursiersNump" wire:keydown.enter="addNewCoursier"
                                                    class="form-control @error('newCoursiersNump') is-invalid @enderror"
                                                    wire:model="newCoursiersNump" />
                                                @error('newCoursiersNump')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="newCoursiersPlaq">Plaque d'immatriculation</label>
                                                <input type="text" id="newCoursiersPlaq" wire:keydown.enter="addNewCoursier"
                                                    class="form-control @error('newCoursiersPlaq') is-invalid @enderror"
                                                    wire:model="newCoursiersPlaq" />
                                                @error('newCoursiersPlaq')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="selectedVehicule">Type de véhicule</label>
                                                <select id="selectedVehicule" wire:model="selectedVehicule" class="form-control">
                                                    <option value="">Sélectionner un véhicule</option>
                                                    @foreach($vehicules as $vehicule)
                                                        <option value="{{ $vehicule->id }}">{{ $vehicule->nom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('selectedVehicule')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="selectedZone">Zone</label>
                                                <select id="selectedZone" wire:model="selectedZone" class="form-control">
                                                    <option value="">Sélectionner une zone</option>
                                                    @foreach($zones as $zone)
                                                        <option value="{{ $zone->id }}">{{ $zone->nom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('selectedZone')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="selectedEmployer">Poste</label>
                                                <select id="selectedEmployer" wire:model="selectedEmployer" class="form-control">
                                                    <option value="">Sélectionner le poste </option>
                                                    @foreach($employers as $employer)
                                                        <option value="{{ $employer->id }}">{{ $employer->poste }}</option>
                                                    @endforeach
                                                </select>
                                                @error('selectedEmployer')
                                                    <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </form>
                       </div>
                    </div>
                 </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                <button class="btn btn-success" wire:click="addNewCoursier"> <i class="fa fa-check"></i> Valider</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#selectedUser').change(function() {
        var userId = $(this).val();
        if (userId) {
            $.ajax({
                url: '/get-user-details/' + userId,
                type: 'GET',
                success: function(data) {
                    $('#userDetails').html(`
                        <h5>Détails du compte</h5>
                        <p><strong>Nom:</strong> ${data.name}</p>
                        <p><strong>Email:</strong> ${data.email}</p>
                    `);
                },
                error: function() {
                    $('#userDetails').html('<p class="text-danger">Erreur lors du chargement des détails.</p>');
                }
            });
        } else {
            $('#userDetails').empty();
        }
    });
});
</script>
