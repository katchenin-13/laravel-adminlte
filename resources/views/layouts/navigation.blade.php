
    <!-- Sidebar -->
        <aside class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>{{ __('Dashboard') }}</p>
                        </a>
                    </li>

                    @role('superadmin')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-cog"></i>
                                <p>
                                    Paramètre
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users')}}" class="nav-link">
                                        <i class="nav-icon fas fa-users"  style="color: #e21515;"></i>
                                        <p>{{ __('Users') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('espace.index')}}" class="nav-link">
                                        <i  class="nav-icon far fa-address-card" style="color: #e21515;"></i>
                                        <p>{{ __('Espace User') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('communes') }}" class="nav-link">
                                        <i class="fas fa-building" style="color: #e21515;"></i>
                                        <p>{{__('Communes')}}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('zones') }}" class="nav-link">
                                        <i class="fas fa-map-marker-alt" style="color: #e21515;"></i>
                                        <p>{{__('Zones')}}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route ('categories')}}" class="nav-link">
                                        <i class="far fa-calendar-alt" style="color: #e21515;"></i>
                                        <p>{{__('Categories')}}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tarifications') }}" class="nav-link">
                                        <i class="fas fa-dollar-sign" style="color: #e21515;"></i>
                                        <p>{{__('Tarifications')}}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('statuts')}}" class="nav-link">
                                        <i class="fas fa-info-circle" style="color: #e21515;"></i>
                                        <p>{{__('Statut')}}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('vehicules')}}" class="nav-link">
                                        <i class="fas fa-car" style="color: #e21515;"></i>
                                        <p>{{__('Type Véhicule')}}</p>
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
                                    <a href="{{route('clients')}}" class="nav-link">
                                        <i class="fas fa-user" style="color: #15a1e2;"></i>
                                        <p>Clients</p>
                                    </a>
                                </li>
                            @endrole
                            <li class="nav-item">
                                <a href="{{route('colis')}}" class="nav-link">
                                    <i class="fas fa-box" style="color: #15a1e2;"></i>
                                    <p>Colis</p>
                                </a>
                            </li>
                            @role('superadmin')
                                <li class="nav-item">
                                    <a href="{{route('coursiers')}}" class="nav-link">
                                        <i class="fas fa-truck" style="color: #15a1e2;"></i>
                                        <p>Coursiers</p>
                                    </a>
                                </li>
                            @endrole
                            <li class="nav-item">
                                <a href="{{route('livraison')}}" class="nav-link">
                                    <i class="fas fa-box" style="color: #15a1e2;"></i>
                                    <p>Livraison</p>
                                </a>
                            </li>
                                <li class="nav-item">
                                    <a href="{{ route('dossiers') }}" class="nav-link">
                                        <i class="fas fa-folder" style="color: #15a1e2;"></i>
                                        <p>Dossiers</p>
                                    </a>
                                </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('stat.index')}}" class="nav-link">
                            <i class="fas fa-chart-bar"></i>
                            <p>{{ __('Stats') }}</p>
                        </a>
                    </li>

                    @role('superadmin')
                        <li class="nav-item">
                                <a href="{{ route('config') }}" class="nav-link">
                                    <i class="fas fa-cogs"></i>
                                    <p>{{ __('Configurations') }}</p>
                                </a>
                        </li>
                    @endrole
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </aside>

