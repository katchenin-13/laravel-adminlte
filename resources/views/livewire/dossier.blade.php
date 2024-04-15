<style>
    .dossier {
        transition: transform 0.3s ease-in-out; /* Animation de transition */
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .dossier:hover {
        transform: scale(1.1); /* Zoom au survol */
    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="alert alert-info" style="margin-top: 20px;">
                        <h3 class="text-center">Dossier Client</h3>
                    </div>

                    <div class="d-flex flex-wrap">
                        @foreach ($clients as $client)
                        <div class="dossier" style="margin-right: 20px; margin-bottom: 20px;">
                            {{-- <p>Nom du client : {{ $client->nom }}</p> --}}
                           <a href="{{ route('contenu')}}"> <img src="{{ asset('images/dossier.png')}}" alt="Image du dossier" style="width: 100px; height: auto;">
                            <p>{{ $client->id }}_{{ $client->nom }}</p></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
