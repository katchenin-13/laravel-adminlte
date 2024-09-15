{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mon Profil</h1>

    <!-- Afficher les messages de succès -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire pour mettre à jour la photo de profil -->
    <div class="mb-4">
        <h2>Photo de Profil</h2>
        <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Photo de profil" width="100" class="mb-2">
        <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="file" name="photo" accept="image/*">
            <button type="submit" class="btn btn-primary">Mettre à jour la photo</button>
        </form>
    </div>

    <!-- Formulaire pour mettre à jour les informations utilisateur -->
    <div class="mb-4">
        <h2>Informations du Profil</h2>
        <form action="{{ route('profile.information.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour les informations</button>
        </form>
    </div>
</div>
@endsection --}}
