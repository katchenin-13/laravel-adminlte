{{--
@extends("Dashboards.layout.app")
@section("contenu")
<div class="container mt-5">



    <h1>Modifier utilisateur</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form method="post" action="{{ url('user/'. $user->id) }}" >
        @method('PATCH')
        @csrf


        <div class="form-group mb-3">

            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" placeholder="Entrer Nom" name="name" value="{{ $user->name}}">

        </div>


        <div class="form-group mb-3">

            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Entrer Email" name="email" value="{{ $user->email}}">

        </div>

        <div class="form-group mb-3">

            <label for="email">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="password" name="password" value="{{ $user->password}}">

        </div>



        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>
@endsection --}}

<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $user->id }}">Éditer l'Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire pour éditer l'utilisateur -->
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à Jour</button>
                </form>
            </div>
        </div>
    </div>
</div>
