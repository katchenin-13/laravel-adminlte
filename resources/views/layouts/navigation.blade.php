<!-- Barre latérale -->
<aside class="sidebar">
    <!-- Panneau utilisateur de la barre latérale (optionnel) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Menu de la barre latérale -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <p>{{ __('Tableau de bord') }}</p>
                </a>
            </li>

            @role('superadmin')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <p>
                            Paramètres
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('espace.index') }}" class="nav-link">
                                <i class="far fa-address-card" style="color: #e21515;"></i>
                                <p>{{ __('Espace Utilisateur') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('users') }}" class="nav-link">
                                <i class="fas fa-user" style="color: #e21515;"></i>
                                <p>{{ __('Utilisateurs') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('communes') }}" class="nav-link">
                                <i class="fas fa-building" style="color: #e21515;"></i>
                                <p>{{ __('Communes') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employers') }}" class="nav-link">
                                <i class="fas fa-user-tie" style="color: #e21515;"></i>
                                <p>{{ __('Employés') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('zones') }}" class="nav-link">
                                <i class="fas fa-map-marker-alt" style="color: #e21515;"></i>
                                <p>{{ __('Zones') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories') }}" class="nav-link">
                                <i class="far fa-calendar-alt" style="color: #e21515;"></i>
                                <p>{{ __('Catégories') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tarifications') }}" class="nav-link">
                                <i class="fas fa-dollar-sign" style="color: #e21515;"></i>
                                <p>{{ __('Tarifications') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('statuts') }}" class="nav-link">
                                <i class="fas fa-info-circle" style="color: #e21515;"></i>
                                <p>{{ __('Statut') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('vehicules') }}" class="nav-link">
                                <i class="fas fa-car" style="color: #e21515;"></i>
                                <p>{{ __('Type de Véhicule') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endrole

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-file-alt"></i>
                    <p>
                        Gestionnaires
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @role('superadmin')
                        <li class="nav-item">
                            <a href="{{ route('clients') }}" class="nav-link">
                                <i class="fas fa-user" style="color: #15a1e2;"></i>
                                <p>Clients</p>
                            </a>
                        </li>
                    @endrole
                    <li class="nav-item">
                        <a href="{{ route('colis') }}" class="nav-link">
                            <i class="fas fa-box" style="color: #15a1e2;"></i>
                            <p>Colis</p>
                        </a>
                    </li>
                    @role('superadmin')
                        <li class="nav-item">
                            <a href="{{ route('coursiers') }}" class="nav-link">
                                <i class="fas fa-truck" style="color: #15a1e2;"></i>
                                <p>Coursiers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('managers') }}" class="nav-link">
                                <i class="fas fa-user" style="color: #15a1e2;"></i>
                                <p>{{ __('Manager') }}</p>
                            </a>
                        </li>
                    @endrole
                    <li class="nav-item">
                        <a href="{{ route('livraison') }}" class="nav-link">
                            <i class="fas fa-truck-moving" style="color: #15a1e2;"></i>
                            <p>Livraison</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dossiers') }}" class="nav-link">
                            <i class="fas fa-folder" style="color: #15a1e2;"></i>
                            <p>Dossiers</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('comptes')}}" class="nav-link">
                            <i class="fas fa-users" style="color: #15a1e2;"></i>
                            <p>{{ __('Compte C') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('comptesm')}}" class="nav-link">
                            <i class="fas fa-user" style="color: #15a1e2;"></i>
                            <p>{{ __('Compte M') }}</p>
                        </a>
                    </li>
                </ul>
            </li>





            @role('superadmin')
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <p>
                            Paiement
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route ('payer')}}" class="nav-link">
                                <i class="fas fa-file-invoice-dollar" style="color: #04ff58;"></i>
                                <p>{{ __('Paiement des factures') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('stat.index') }}" class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        <p>{{ __('Statistiques') }}</p>
                    </a>
                </li>
            @endrole
        </ul>
    </nav>
    <!-- /.menu de la barre latérale -->
</aside>
