<!-- Barre latérale -->
<aside class="sidebar">
    <!-- Panneau utilisateur de la barre latérale -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Menu de la barre latérale -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Tableau de bord -->
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <p>{{ __('Tableau de bord') }}</p>
                </a>
            </li>

            <!-- Paramètres -->
            @role('superadmin')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog" style="color:red;"></i>
                        <p>
                            {{ __('Paramètres') }}
                            <i class="fas fa-angle-left right" ></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('espace.index') }}" class="nav-link"> <i class="far fa-address-card" style="color:red;"></i> <p>{{ __('Espace Utilisateur') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('users') }}" class="nav-link"> <i class="fas fa-user" style="color:red;"></i> <p>{{ __('Utilisateurs') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('communes') }}" class="nav-link"> <i class="fas fa-building" style="color:red;"></i> <p>{{ __('Communes') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('employers') }}" class="nav-link"> <i class="fas fa-user-tie" style="color:red;"></i> <p>{{ __('Employés') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('zones') }}" class="nav-link"> <i class="fas fa-map-marker-alt" style="color:red;"></i> <p>{{ __('Zones') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('categories') }}" class="nav-link"> <i class="far fa-calendar-alt" style="color:red;"></i> <p>{{ __('Catégories') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('tarifications') }}" class="nav-link"> <i class="fas fa-dollar-sign" style="color:red;"> </i> <p>{{ __('Tarifications') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('statuts') }}" class="nav-link"> <i class="fas fa-info-circle" style="color:red;"></i> <p>{{ __('Statut') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('vehicules') }}" class="nav-link"> <i class="fas fa-car" style="color:red;"></i> <p>{{ __('Type de Véhicule') }}</p></a></li>
                    </ul>
                </li>
            @endrole

            @role('manager')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog" style="color:red;"></i>
                        <p>
                            {{ __('Paramètres') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Même contenu que pour superadmin -->
                        <li class="nav-item"><a href="{{ route('espace.index') }}" class="nav-link"> <i class="far fa-address-card" style="color:red;"></i> <p>{{ __('Espace Utilisateur') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('users') }}" class="nav-link"> <i class="fas fa-user" style="color:red;"></i> <p>{{ __('Utilisateurs') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('communes') }}" class="nav-link"> <i class="fas fa-building" style="color:red;"></i> <p>{{ __('Communes') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('employers') }}" class="nav-link"> <i class="fas fa-user-tie" style="color:red;"></i> <p>{{ __('Employés') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('zones') }}" class="nav-link"> <i class="fas fa-map-marker-alt" style="color:red;"></i> <p>{{ __('Zones') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('categories') }}" class="nav-link"> <i class="far fa-calendar-alt" style="color:red;"></i> <p>{{ __('Catégories') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('tarifications') }}" class="nav-link"> <i class="fas fa-dollar-sign" style="color:red;"></i> <p>{{ __('Tarifications') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('statuts') }}" class="nav-link"><i class="fas fa-info-circle"></i> <p>{{ __('Statut') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('vehicules') }}" class="nav-link"><i class="fas fa-car" style="color:red;"></i> <p>{{ __('Type de Véhicule') }}</p></a></li>
                    </ul>
                </li>
            @endrole

            <!-- Gestionnaires -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-users" style="color:rgb(20, 239, 255);"></i>
                    <p>
                        {{ __('Gestionnaires') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @role('superadmin')
                        <li class="nav-item"><a href="{{ route('clients') }}" class="nav-link"><i class="fas fa-user" style="color:rgb(20, 239, 255);"></i> <p>{{ __('Clients') }}</p></a></li>
                    @endrole
                    @role('manager')
                        <li class="nav-item"><a href="{{ route('clients') }}" class="nav-link" ><i class="fas fa-user" style="color:rgb(20, 239, 255);"></i> <p>{{ __('Clients') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('dossiers') }}" class="nav-link"><i class="fas fa-folder" style="color:rgb(20, 239, 255);"></i> <p>{{ __('Dossiers') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('coursiers') }}" class="nav-link"><i class="fas fa-truck" style="color:rgb(20, 239, 255);"></i> <p>{{ __('Coursiers') }}</p></a></li>
                    @endrole
                    <li class="nav-item"><a href="{{ route('colis') }}" class="nav-link"><i class="fas fa-box" style="color:rgb(20, 239, 255);"></i> <p>{{ __('Colis') }}</p></a></li>
                    @role('superadmin')
                        <li class="nav-item"><a href="{{ route('coursiers') }}" class="nav-link"><i class="fas fa-truck" style="color:rgb(20, 239, 255);"></i> <p>{{ __('Coursiers') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('managers') }}" class="nav-link"><i class="fas fa-user" style="color:rgb(20, 239, 255);"></i> <p>{{ __('Manager') }}</p></a></li>
                    @endrole
                    <li class="nav-item"><a href="{{ route('livraison') }}" class="nav-link"><i class="fas fa-truck-moving" style="color:rgb(20, 239, 255);"></i> <p>{{ __('Livraison') }}</p></a></li>
                    @role('superadmin')
                        <li class="nav-item"><a href="{{ route('dossiers') }}" class="nav-link"><i class="fas fa-folder" style="color:rgb(20, 239, 255);"></i> <p>{{ __('Dossiers') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('comptes') }}" class="nav-link"><i class="fas fa-users" style="color:rgb(20, 239, 255);"></i> <p>{{ __('Compte C') }}</p></a></li>
                        <li class="nav-item"><a href="{{ route('comptesm') }}" class="nav-link"><i class="fas fa-user" style="color:rgb(20, 239, 255);"></i> <p>{{ __('Compte M') }}</p></a></li>
                    @endrole
                </ul>
            </li>

            <!-- Paiement et Statistiques -->
            @role('superadmin|manager')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-invoice-dollar" style="color:rgb(0, 189, 51)"></i>
                        <p>
                            {{ __('Paiement') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('payer') }}" class="nav-link">
                                <i class="fas fa-file-invoice-dollar" style="color:rgb(0, 189, 51)"></i>
                                <p>{{ __('Paiement des factures') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('stat.index') }}" class="nav-link">
                        <i class="fas fa-chart-bar" style="color:rgb(163, 34, 255)"></i>
                        <p>{{ __('Statistiques') }}</p>
                    </a>
                </li>
            @endrole
        </ul>
    </nav>
    <!-- /.menu de la barre latérale -->
</aside>
