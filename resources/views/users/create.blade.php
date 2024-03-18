@extends('layouts.app')

@section('content')

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style="top:50px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #15a1e2; color: white;">
                <h5 class="modal-title">Formulaire Commune</h5>

            </div>
            <div class="form-group" >
                <div class="modal-body">
                    <div class="d-flex my-4 bg-gray-light p-3">
                        <div class="d-flex flex-grow-1 mr-2">
                            <div class="flex-grow-1 mr-2">

                                    <!-- Champ de saisie pour le nom de la commune -->
                                    <div class="form-group">Nom de la commune
                                        <input type="text" wire:keydown.enter="addNewCommune"
                                        class="form-control @error('newCommuneName') is-invalid @enderror"
                                        wire:model="newCommuneName" />
                                    @error('newCommuneName')
                                        <span class="text-danger animate__animated animate__fadeInDown">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    @if (session()->has('message'))
                                        <div class="alert alert-success ">
                                            {{ session('message') }}
                                        </div>
                                    @endif

                            </div>      <!-- Autres éléments existants de la modal -->
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click="closeModal"><i class="fas fa-times"></i> Fermer</button>
                <button class="btn btn-success" wire:click="addNewCommune"> <i class="fa fa-check"></i> Valider</button>
            </div>
        </div>
    </div>
</div>

{{--
<div style="margin-left: 3%; font-weight: bold;">
    <h1 class="text-center">AJOUTER UN UTILISATEUR</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif
    <div class="col-md-10 mx-auto">
    <form action="{{ url('user') }}" method="POST">
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



        <button type="submit" class="btn btn-primary">Enregister</button>

    </form>
    </div>
</div> --}}

@endsection
