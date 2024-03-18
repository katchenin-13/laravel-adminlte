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
