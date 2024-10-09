{{-- <html lang="en" style="height: auto;"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title _msttexthash="1142141" _msthash="0">AdministrateurLTE 3 | ChartJS (en anglais)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style type="text/css">/* Chart.js */
  @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>
  <body class="sidebar-mini" style="height: auto;">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../index3.html" class="nav-link" _msttexthash="111306" _msthash="1">Domicile</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link" _msttexthash="94510" _msthash="2">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item" _msthidden="1">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block" _msthidden="1">
            <form class="form-inline" _msthidden="1">
              <div class="input-group input-group-sm" _msthidden="1">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" _msthidden="A" _mstplaceholder="74607" _msthash="3" _mstaria-label="74607">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge" _msttexthash="4641" _msthash="4">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" _msthidden="13">
            <a href="#" class="dropdown-item" _msthidden="4">
              <!-- Message Start -->
              <div class="media" _msthidden="4">
                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle" _msthidden="A" _mstalt="154167" _msthash="5">
                <div class="media-body" _msthidden="3">
                  <h3 class="dropdown-item-title" _msthidden="1"><font _mstmutation="1" _msttexthash="148473" _msthidden="1" _msthash="6">
                    Brad Diesel
                    </font><span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm" _msttexthash="509925" _msthidden="1" _msthash="7">Call me whenever you can...</p>
                  <p class="text-sm text-muted" _msthidden="1"><i class="far fa-clock mr-1"></i><font _mstmutation="1" _msttexthash="126035" _msthidden="1" _msthash="8"> 4 Hours Ago</font></p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" _msthidden="4">
              <!-- Message Start -->
              <div class="media" _msthidden="4">
                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" _msthidden="A" _mstalt="154167" _msthash="9">
                <div class="media-body" _msthidden="3">
                  <h3 class="dropdown-item-title" _msthidden="1"><font _mstmutation="1" _msttexthash="150696" _msthidden="1" _msthash="10">
                    John Pierce
                    </font><span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm" _msttexthash="390208" _msthidden="1" _msthash="11">I got your message bro</p>
                  <p class="text-sm text-muted" _msthidden="1"><i class="far fa-clock mr-1"></i><font _mstmutation="1" _msttexthash="126035" _msthidden="1" _msthash="12"> 4 Hours Ago</font></p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" _msthidden="4">
              <!-- Message Start -->
              <div class="media" _msthidden="4">
                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" _msthidden="A" _mstalt="154167" _msthash="13">
                <div class="media-body" _msthidden="3">
                  <h3 class="dropdown-item-title" _msthidden="1"><font _mstmutation="1" _msttexthash="233610" _msthidden="1" _msthash="14">
                    Nora Silvester
                    </font><span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm" _msttexthash="383435" _msthidden="1" _msthash="15">The subject goes here</p>
                  <p class="text-sm text-muted" _msthidden="1"><i class="far fa-clock mr-1"></i><font _mstmutation="1" _msttexthash="126035" _msthidden="1" _msthash="16"> 4 Hours Ago</font></p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer" _msttexthash="248742" _msthidden="1" _msthash="17">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge" _msttexthash="9971" _msthash="18">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" _msthidden="8">
            <span class="dropdown-item dropdown-header" _msttexthash="279942" _msthidden="1" _msthash="19">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" _msthidden="2">
              <i class="fas fa-envelope mr-2"></i><font _mstmutation="1" _msttexthash="204737" _msthidden="1" _msthash="20"> 4 new messages
              </font><span class="float-right text-muted text-sm" _msttexthash="59007" _msthidden="1" _msthash="21">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" _msthidden="2">
              <i class="fas fa-users mr-2"></i><font _mstmutation="1" _msttexthash="294593" _msthidden="1" _msthash="22"> 8 friend requests
              </font><span class="float-right text-muted text-sm" _msttexthash="90207" _msthidden="1" _msthash="23">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" _msthidden="2">
              <i class="fas fa-file mr-2"></i><font _mstmutation="1" _msttexthash="186329" _msthidden="1" _msthash="24"> 3 new reports
              </font><span class="float-right text-muted text-sm" _msttexthash="58474" _msthidden="1" _msthash="25">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer" _msttexthash="411827" _msthidden="1" _msthash="26">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" _mstalt="183703" _msthash="27">
        <span class="brand-text font-weight-light" _msttexthash="346905" _msthash="28">AdministrateurLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Image de l’utilisateur" _mstalt="128609" _msthash="29">
          </div>
          <div class="info">
            <a href="#" class="d-block" _msttexthash="277888" _msthash="30">Alexandre Pierce</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Rechercher" aria-label="Rechercher" _mstplaceholder="74607" _msthash="31" _mstaria-label="74607">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div><div class="sidebar-search-results" _msthidden="1"><div class="list-group" _msthidden="1"><a href="#" class="list-group-item" _msthidden="1"><div class="search-title" _msthidden="1"><strong class="text-light"></strong><font _mstmutation="1" _msttexthash="270959" _msthidden="1" _msthash="32">N<strong class="text-light" _mstmutation="1"></strong>o<strong class="text-light" _mstmutation="1"></strong> <strong class="text-light" _mstmutation="1"></strong>e<strong class="text-light" _mstmutation="1"></strong>l<strong class="text-light" _mstmutation="1"></strong>e<strong class="text-light" _mstmutation="1"></strong>m<strong class="text-light" _mstmutation="1"></strong>e<strong class="text-light" _mstmutation="1"></strong>n<strong class="text-light" _mstmutation="1"></strong>t<strong class="text-light" _mstmutation="1"></strong> <strong class="text-light" _mstmutation="1"></strong>f<strong class="text-light" _mstmutation="1"></strong>o<strong class="text-light" _mstmutation="1"></strong>u<strong class="text-light" _mstmutation="1"></strong>n<strong class="text-light" _mstmutation="1"></strong>d<strong class="text-light" _mstmutation="1"></strong>!</font><strong class="text-light"></strong></div><div class="search-path"></div></a></div></div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p><font _mstmutation="1" _msttexthash="226772" _msthash="33"> Tableau de bord </font><i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" _msthidden="3">
                <li class="nav-item" _msthidden="1">
                  <a href="../../index.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="166595" _msthidden="1" _msthash="34">Dashboard v1</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../../index2.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="166816" _msthidden="1" _msthash="35">Dashboard v2</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../../index3.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="167037" _msthidden="1" _msthash="36">Dashboard v3</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../widgets.html" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p><font _mstmutation="1" _msttexthash="95901" _msthash="37">
                  Widgets
                  </font><span class="right badge badge-danger" _msttexthash="97019" _msthash="38">Nouveau</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p><font _mstmutation="1" _msttexthash="416442" _msthash="39"> Options de mise en page </font><i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right" _msttexthash="4914" _msthash="40">6</span>
                </p>
              </a>
              <ul class="nav nav-treeview" _msthidden="8">
                <li class="nav-item" _msthidden="1">
                  <a href="../layout/top-nav.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="230594" _msthidden="1" _msthash="41">Top Navigation</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../layout/top-nav-sidebar.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="460525" _msthidden="1" _msthash="42">Top Navigation + Sidebar</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../layout/boxed.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="59020" _msthidden="1" _msthash="43">Boxed</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../layout/fixed-sidebar.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="195845" _msthidden="1" _msthash="44">Fixed Sidebar</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../layout/fixed-sidebar-custom.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="528775" _msthidden="1" _msthash="45">Fixed Sidebar <small>+ Custom Area</small></p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../layout/fixed-topnav.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="173277" _msthidden="1" _msthash="46">Fixed Navbar</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../layout/fixed-footer.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="177463" _msthidden="1" _msthash="47">Fixed Footer</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../layout/collapsed-sidebar.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="306358" _msthidden="1" _msthash="48">Collapsed Sidebar</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p><font _mstmutation="1" _msttexthash="159484" _msthash="49"> Graphiques </font><i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="chartjs.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="339482" _msthash="50">ChartJS (en anglais)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="flot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="32032" _msthash="51">Lot</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="inline.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="75855" _msthash="52">Inline</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="uplot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="290160" _msthash="53">uPlot (en anglais)</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p><font _mstmutation="1" _msttexthash="2931006" _msthash="54"> Éléments de l’interface utilisateur </font><i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" _msthidden="8">
                <li class="nav-item" _msthidden="1">
                  <a href="../UI/general.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="92651" _msthidden="1" _msthash="55">General</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../UI/icons.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="60671" _msthidden="1" _msthash="56">Icons</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../UI/buttons.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="99294" _msthidden="1" _msthash="57">Buttons</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../UI/sliders.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="95732" _msthidden="1" _msthash="58">Sliders</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../UI/modals.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="217308" _msthidden="1" _msthash="59">Modals &amp; Alerts</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../UI/navbar.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="161811" _msthidden="1" _msthash="60">Navbar &amp; Tabs</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../UI/timeline.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="113243" _msthidden="1" _msthash="61">Timeline</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../UI/ribbons.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="95056" _msthidden="1" _msthash="62">Ribbons</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p><font _mstmutation="1" _msttexthash="77805" _msthash="63"> Formes </font><i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" _msthidden="4">
                <li class="nav-item" _msthidden="1">
                  <a href="../forms/general.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="283725" _msthidden="1" _msthash="64">General Elements</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../forms/advanced.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="311025" _msthidden="1" _msthash="65">Advanced Elements</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../forms/editors.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="97136" _msthidden="1" _msthash="66">Editors</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../forms/validation.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="156871" _msthidden="1" _msthash="67">Validation</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p><font _mstmutation="1" _msttexthash="75621" _msthash="68">
                  Tables
                  </font><i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" _msthidden="3">
                <li class="nav-item" _msthidden="1">
                  <a href="../tables/simple.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="199641" _msthidden="1" _msthash="69">Simple Tables</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../tables/data.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="149435" _msthidden="1" _msthash="70">DataTables</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../tables/jsgrid.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="75348" _msthidden="1" _msthash="71">jsGrid</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header" _msttexthash="83577" _msthash="72">EXEMPLES</li>
            <li class="nav-item">
              <a href="../calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p><font _mstmutation="1" _msttexthash="155064" _msthash="73"> Calendrier </font><span class="badge badge-info right" _msttexthash="4550" _msthash="74">2</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../gallery.html" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p _msttexthash="92066" _msthash="75"> Galerie </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kanban.html" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p _msttexthash="219557" _msthash="76"> Tableau Kanban </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p><font _mstmutation="1" _msttexthash="312325" _msthash="77"> Boîte aux lettres </font><i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" _msthidden="3">
                <li class="nav-item" _msthidden="1">
                  <a href="../mailbox/mailbox.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="61139" _msthidden="1" _msthash="78">Inbox</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../mailbox/compose.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="95836" _msthidden="1" _msthash="79">Compose</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../mailbox/read-mail.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="42315" _msthidden="1" _msthash="80">Read</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p><font _mstmutation="1" _msttexthash="58994" _msthash="81">
                  Pages
                  </font><i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" _msthidden="10">
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/invoice.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="93847" _msthidden="1" _msthash="82">Invoice</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/profile.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="94315" _msthidden="1" _msthash="83">Profile</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/e-commerce.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="147693" _msthidden="1" _msthash="84">E-commerce</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/projects.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="116324" _msthidden="1" _msthash="85">Projects</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/project-add.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="147524" _msthidden="1" _msthash="86">Project Add</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/project-edit.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="174928" _msthidden="1" _msthash="87">Project Edit</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/project-detail.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="224276" _msthidden="1" _msthash="88">Project Detail</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/contacts.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="115440" _msthidden="1" _msthash="89">Contacts</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/faq.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="22607" _msthidden="1" _msthash="90">FAQ</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/contact-us.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="138229" _msthidden="1" _msthash="91">Contact us</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p><font _mstmutation="1" _msttexthash="78962" _msthash="92">
                  Extras
                  </font><i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" _msthidden="18">
                <li class="nav-item" _msthidden="5">
                  <a href="#" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msthidden="1"><font _mstmutation="1" _msttexthash="293358" _msthidden="1" _msthash="93">
                      Login &amp; Register v1
                      </font><i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" _msthidden="4">
                    <li class="nav-item" _msthidden="1">
                      <a href="../examples/login.html" class="nav-link" _msthidden="1">
                        <i class="far fa-circle nav-icon"></i>
                        <p _msttexthash="86580" _msthidden="1" _msthash="94">Login v1</p>
                      </a>
                    </li>
                    <li class="nav-item" _msthidden="1">
                      <a href="../examples/register.html" class="nav-link" _msthidden="1">
                        <i class="far fa-circle nav-icon"></i>
                        <p _msttexthash="149227" _msthidden="1" _msthash="95">Register v1</p>
                      </a>
                    </li>
                    <li class="nav-item" _msthidden="1">
                      <a href="../examples/forgot-password.html" class="nav-link" _msthidden="1">
                        <i class="far fa-circle nav-icon"></i>
                        <p _msttexthash="308789" _msthidden="1" _msthash="96">Forgot Password v1</p>
                      </a>
                    </li>
                    <li class="nav-item" _msthidden="1">
                      <a href="../examples/recover-password.html" class="nav-link" _msthidden="1">
                        <i class="far fa-circle nav-icon"></i>
                        <p _msttexthash="339287" _msthidden="1" _msthash="97">Recover Password v1</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item" _msthidden="5">
                  <a href="#" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msthidden="1"><font _mstmutation="1" _msttexthash="293644" _msthidden="1" _msthash="98">
                      Login &amp; Register v2
                      </font><i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" _msthidden="4">
                    <li class="nav-item" _msthidden="1">
                      <a href="../examples/login-v2.html" class="nav-link" _msthidden="1">
                        <i class="far fa-circle nav-icon"></i>
                        <p _msttexthash="86749" _msthidden="1" _msthash="99">Login v2</p>
                      </a>
                    </li>
                    <li class="nav-item" _msthidden="1">
                      <a href="../examples/register-v2.html" class="nav-link" _msthidden="1">
                        <i class="far fa-circle nav-icon"></i>
                        <p _msttexthash="149435" _msthidden="1" _msthash="100">Register v2</p>
                      </a>
                    </li>
                    <li class="nav-item" _msthidden="1">
                      <a href="../examples/forgot-password-v2.html" class="nav-link" _msthidden="1">
                        <i class="far fa-circle nav-icon"></i>
                        <p _msttexthash="309075" _msthidden="1" _msthash="101">Forgot Password v2</p>
                      </a>
                    </li>
                    <li class="nav-item" _msthidden="1">
                      <a href="../examples/recover-password-v2.html" class="nav-link" _msthidden="1">
                        <i class="far fa-circle nav-icon"></i>
                        <p _msttexthash="339586" _msthidden="1" _msthash="102">Recover Password v2</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/lockscreen.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="156065" _msthidden="1" _msthash="103">Lockscreen</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/legacy-user-menu.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="252057" _msthidden="1" _msthash="104">Legacy User Menu</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/language-menu.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="198627" _msthidden="1" _msthash="105">Language Menu</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/404.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="87893" _msthidden="1" _msthash="106">Error 404</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/500.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="87321" _msthidden="1" _msthash="107">Error 500</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/pace.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="42081" _msthidden="1" _msthash="108">Pace</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../examples/blank.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="125502" _msthidden="1" _msthash="109">Blank Page</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../../starter.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="174616" _msthidden="1" _msthash="110">Starter Page</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-search"></i>
                <p><font _mstmutation="1" _msttexthash="154362" _msthash="111"> Rechercher </font><i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" _msthidden="2">
                <li class="nav-item" _msthidden="1">
                  <a href="../search/simple.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="198237" _msthidden="1" _msthash="112">Simple Search</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="../search/enhanced.html" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="108940" _msthidden="1" _msthash="113">Enhanced</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header" _msttexthash="57486" _msthash="114">DIVERS</li>
            <li class="nav-item">
              <a href="../../iframe.html" class="nav-link">
                <i class="nav-icon fas fa-ellipsis-h"></i>
                <p _msttexthash="477022" _msthash="115">Plugin IFrame à onglets</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p _msttexthash="234962" _msthash="116">Documentation</p>
              </a>
            </li>
            <li class="nav-header" _msttexthash="471848" _msthash="117">EXEMPLE À PLUSIEURS NIVEAUX</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p _msttexthash="85358" _msthash="118">Niveau 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p><font _mstmutation="1" _msttexthash="85358" _msthash="119"> Niveau 1 </font><i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" _msthidden="6">
                <li class="nav-item" _msthidden="1">
                  <a href="#" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="67600" _msthidden="1" _msthash="120">Level 2</p>
                  </a>
                </li>
                <li class="nav-item" _msthidden="4">
                  <a href="#" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msthidden="1"><font _mstmutation="1" _msttexthash="67600" _msthidden="1" _msthash="121">
                      Level 2
                      </font><i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" _msthidden="3">
                    <li class="nav-item" _msthidden="1">
                      <a href="#" class="nav-link" _msthidden="1">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p _msttexthash="67756" _msthidden="1" _msthash="122">Level 3</p>
                      </a>
                    </li>
                    <li class="nav-item" _msthidden="1">
                      <a href="#" class="nav-link" _msthidden="1">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p _msttexthash="67756" _msthidden="1" _msthash="123">Level 3</p>
                      </a>
                    </li>
                    <li class="nav-item" _msthidden="1">
                      <a href="#" class="nav-link" _msthidden="1">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p _msttexthash="67756" _msthidden="1" _msthash="124">Level 3</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item" _msthidden="1">
                  <a href="#" class="nav-link" _msthidden="1">
                    <i class="far fa-circle nav-icon"></i>
                    <p _msttexthash="67600" _msthidden="1" _msthash="125">Level 2</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p _msttexthash="85358" _msthash="126">Niveau 1</p>
              </a>
            </li>
            <li class="nav-header" _msttexthash="129220" _msthash="127">ÉTIQUETTES</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text" _msttexthash="138944" _msthash="128">Important</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p _msttexthash="237237" _msthash="129">Avertissement</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p _msttexthash="261898" _msthash="130">Informationnel</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1369.31px;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 _msttexthash="339482" _msthash="131">ChartJS (en anglais)</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#" _msttexthash="111306" _msthash="132">Domicile</a></li>
                <li class="breadcrumb-item active" _msttexthash="339482" _msthash="133">ChartJS (en anglais)</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <!-- AREA CHART -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title" _msttexthash="319618" _msthash="134">Graphique en aires</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 484px;" width="484" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- DONUT CHART -->
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title" _msttexthash="349648" _msthash="135">Graphique en anneau</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 484px;" width="484" height="250" class="chartjs-render-monitor"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- PIE CHART -->
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title" _msttexthash="133380" _msthash="136">Camembert</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 484px;" width="484" height="250" class="chartjs-render-monitor"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
              <!-- LINE CHART -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title" _msttexthash="381212" _msthash="137">Graphique linéaire</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 484px;" width="484" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- BAR CHART -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title" _msttexthash="344773" _msthash="138">Graphique à barres</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body" style="display: block;">
                  <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 484px;" width="484" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- STACKED BAR CHART -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title" _msttexthash="686517" _msthash="139">Graphique à barres empilées</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 484px;" width="484" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!-- /.col (RIGHT) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <font _mstmutation="1" _msttexthash="157027" _msthash="140"><b _mstmutation="1" _istranslated="1">Édition</b> 3.2.0 </font></div>
      <font _mstmutation="1" _msttexthash="3970811" _msthash="141"><strong _mstmutation="1" _istranslated="1">Droits d’auteur © 2014-2021 <a href="https://adminlte.io" _istranslated="1">AdminLTE.io</a>.</strong> Tous droits réservés. </font></footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark" _msthidden="122" style="display: none;">
      <!-- Add Content Here -->
    <div class="p-3 control-sidebar-content" style="" _msthidden="122"><h5 _msttexthash="320385" _msthidden="1" _msthash="142">Customize AdminLTE</h5><hr class="mb-2"><div class="mb-4" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="107133" _msthidden="1" _msthash="143">Dark Mode</span></div><h6 _msttexthash="230503" _msthidden="1" _msthash="144">Header Options</h6><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="58760" _msthidden="1" _msthash="145">Fixed</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="443690" _msthidden="1" _msthash="146">Dropdown Legacy Offset</span></div><div class="mb-4" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="114257" _msthidden="1" _msthash="147">No border</span></div><h6 _msttexthash="258310" _msthidden="1" _msthash="148">Sidebar Options</h6><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="132977" _msthidden="1" _msthash="149">Collapsed</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="58760" _msthidden="1" _msthash="150">Fixed</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" checked="checked" class="mr-1"><span _msttexthash="172289" _msthidden="1" _msthash="151">Sidebar Mini</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="207103" _msthidden="1" _msthash="152">Sidebar Mini MD</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="213382" _msthidden="1" _msthash="153">Sidebar Mini XS</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="200668" _msthidden="1" _msthash="154">Nav Flat Style</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="253539" _msthidden="1" _msthash="155">Nav Legacy Style</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="152594" _msthidden="1" _msthash="156">Nav Compact</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="247585" _msthidden="1" _msthash="157">Nav Child Indent</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="507572" _msthidden="1" _msthash="158">Nav Child Hide on Collapse</span></div><div class="mb-4" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="775034" _msthidden="1" _msthash="159">Disable Hover/Focus Auto-Expand</span></div><h6 _msttexthash="235079" _msthidden="1" _msthash="160">Footer Options</h6><div class="mb-4" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="58760" _msthidden="1" _msthash="161">Fixed</span></div><h6 _msttexthash="320398" _msthidden="1" _msthash="162">Small Text Options</h6><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="44980" _msthidden="1" _msthash="163">Body</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="75387" _msthidden="1" _msthash="164">Navbar</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="57811" _msthidden="1" _msthash="165">Brand</span></div><div class="mb-1" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="149370" _msthidden="1" _msthash="166">Sidebar Nav</span></div><div class="mb-4" _msthidden="1"><input type="checkbox" value="1" class="mr-1"><span _msttexthash="78208" _msthidden="1" _msthash="167">Footer</span></div><h6 _msttexthash="257374" _msthidden="1" _msthash="168">Navbar Variants</h6><div class="d-flex" _msthidden="19"><select class="custom-select mb-3 text-light border-0 bg-white" _msthidden="19"><option class="bg-primary" _msttexthash="97695" _msthidden="1" _msthash="169">Primary</option><option class="bg-secondary" _msttexthash="136136" _msthidden="1" _msthash="170">Secondary</option><option class="bg-info" _msttexthash="44447" _msthidden="1" _msthash="171">Info</option><option class="bg-success" _msttexthash="95992" _msthidden="1" _msthash="172">Success</option><option class="bg-danger" _msttexthash="74763" _msthidden="1" _msthash="173">Danger</option><option class="bg-indigo" _msttexthash="75478" _msthidden="1" _msthash="174">Indigo</option><option class="bg-purple" _msttexthash="78546" _msthidden="1" _msthash="175">Purple</option><option class="bg-pink" _msttexthash="44980" _msthidden="1" _msthash="176">Pink</option><option class="bg-navy" _msttexthash="46722" _msthidden="1" _msthash="177">Navy</option><option class="bg-lightblue" _msttexthash="134524" _msthidden="1" _msthash="178">Lightblue</option><option class="bg-teal" _msttexthash="43537" _msthidden="1" _msthash="179">Teal</option><option class="bg-cyan" _msttexthash="44330" _msthidden="1" _msthash="180">Cyan</option><option class="bg-dark" _msttexthash="43524" _msthidden="1" _msthash="181">Dark</option><option class="bg-gray-dark" _msttexthash="113568" _msthidden="1" _msthash="182">Gray dark</option><option class="bg-gray" _msttexthash="45396" _msthidden="1" _msthash="183">Gray</option><option class="bg-light" _msttexthash="59995" _msthidden="1" _msthash="184">Light</option><option class="bg-warning" _msttexthash="95225" _msthidden="1" _msthash="185">Warning</option><option class="bg-white" _msttexthash="60541" _msthidden="1" _msthash="186">White</option><option class="bg-orange" _msttexthash="75179" _msthidden="1" _msthash="187">Orange</option></select></div><h6 _msttexthash="412204" _msthidden="1" _msthash="188">Accent Color Variants</h6><div class="d-flex"></div><select class="custom-select mb-3 border-0" _msthidden="17"><option _msttexthash="198055" _msthidden="1" _msthash="189">None Selected</option><option class="bg-primary" _msttexthash="97695" _msthidden="1" _msthash="190">Primary</option><option class="bg-warning" _msttexthash="95225" _msthidden="1" _msthash="191">Warning</option><option class="bg-info" _msttexthash="44447" _msthidden="1" _msthash="192">Info</option><option class="bg-danger" _msttexthash="74763" _msthidden="1" _msthash="193">Danger</option><option class="bg-success" _msttexthash="95992" _msthidden="1" _msthash="194">Success</option><option class="bg-indigo" _msttexthash="75478" _msthidden="1" _msthash="195">Indigo</option><option class="bg-lightblue" _msttexthash="134524" _msthidden="1" _msthash="196">Lightblue</option><option class="bg-navy" _msttexthash="46722" _msthidden="1" _msthash="197">Navy</option><option class="bg-purple" _msttexthash="78546" _msthidden="1" _msthash="198">Purple</option><option class="bg-fuchsia" _msttexthash="92859" _msthidden="1" _msthash="199">Fuchsia</option><option class="bg-pink" _msttexthash="44980" _msthidden="1" _msthash="200">Pink</option><option class="bg-maroon" _msttexthash="77896" _msthidden="1" _msthash="201">Maroon</option><option class="bg-orange" _msttexthash="75179" _msthidden="1" _msthash="202">Orange</option><option class="bg-lime" _msttexthash="43719" _msthidden="1" _msthash="203">Lime</option><option class="bg-teal" _msttexthash="43537" _msthidden="1" _msthash="204">Teal</option><option class="bg-olive" _msttexthash="60489" _msthidden="1" _msthash="205">Olive</option></select><h6 _msttexthash="408122" _msthidden="1" _msthash="206">Dark Sidebar Variants</h6><div class="d-flex"></div><select class="custom-select mb-3 text-light border-0 bg-primary" _msthidden="17"><option _msttexthash="198055" _msthidden="1" _msthash="207">None Selected</option><option class="bg-primary" _msttexthash="97695" _msthidden="1" _msthash="208">Primary</option><option class="bg-warning" _msttexthash="95225" _msthidden="1" _msthash="209">Warning</option><option class="bg-info" _msttexthash="44447" _msthidden="1" _msthash="210">Info</option><option class="bg-danger" _msttexthash="74763" _msthidden="1" _msthash="211">Danger</option><option class="bg-success" _msttexthash="95992" _msthidden="1" _msthash="212">Success</option><option class="bg-indigo" _msttexthash="75478" _msthidden="1" _msthash="213">Indigo</option><option class="bg-lightblue" _msttexthash="134524" _msthidden="1" _msthash="214">Lightblue</option><option class="bg-navy" _msttexthash="46722" _msthidden="1" _msthash="215">Navy</option><option class="bg-purple" _msttexthash="78546" _msthidden="1" _msthash="216">Purple</option><option class="bg-fuchsia" _msttexthash="92859" _msthidden="1" _msthash="217">Fuchsia</option><option class="bg-pink" _msttexthash="44980" _msthidden="1" _msthash="218">Pink</option><option class="bg-maroon" _msttexthash="77896" _msthidden="1" _msthash="219">Maroon</option><option class="bg-orange" _msttexthash="75179" _msthidden="1" _msthash="220">Orange</option><option class="bg-lime" _msttexthash="43719" _msthidden="1" _msthash="221">Lime</option><option class="bg-teal" _msttexthash="43537" _msthidden="1" _msthash="222">Teal</option><option class="bg-olive" _msttexthash="60489" _msthidden="1" _msthash="223">Olive</option></select><h6 _msttexthash="444587" _msthidden="1" _msthash="224">Light Sidebar Variants</h6><div class="d-flex"></div><select class="custom-select mb-3 border-0" _msthidden="17"><option _msttexthash="198055" _msthidden="1" _msthash="225">None Selected</option><option class="bg-primary" _msttexthash="97695" _msthidden="1" _msthash="226">Primary</option><option class="bg-warning" _msttexthash="95225" _msthidden="1" _msthash="227">Warning</option><option class="bg-info" _msttexthash="44447" _msthidden="1" _msthash="228">Info</option><option class="bg-danger" _msttexthash="74763" _msthidden="1" _msthash="229">Danger</option><option class="bg-success" _msttexthash="95992" _msthidden="1" _msthash="230">Success</option><option class="bg-indigo" _msttexthash="75478" _msthidden="1" _msthash="231">Indigo</option><option class="bg-lightblue" _msttexthash="134524" _msthidden="1" _msthash="232">Lightblue</option><option class="bg-navy" _msttexthash="46722" _msthidden="1" _msthash="233">Navy</option><option class="bg-purple" _msttexthash="78546" _msthidden="1" _msthash="234">Purple</option><option class="bg-fuchsia" _msttexthash="92859" _msthidden="1" _msthash="235">Fuchsia</option><option class="bg-pink" _msttexthash="44980" _msthidden="1" _msthash="236">Pink</option><option class="bg-maroon" _msttexthash="77896" _msthidden="1" _msthash="237">Maroon</option><option class="bg-orange" _msttexthash="75179" _msthidden="1" _msthash="238">Orange</option><option class="bg-lime" _msttexthash="43719" _msthidden="1" _msthash="239">Lime</option><option class="bg-teal" _msttexthash="43537" _msthidden="1" _msthash="240">Teal</option><option class="bg-olive" _msttexthash="60489" _msthidden="1" _msthash="241">Olive</option></select><h6 _msttexthash="343564" _msthidden="1" _msthash="242">Brand Logo Variants</h6><div class="d-flex"></div><select class="custom-select mb-3 border-0" _msthidden="21"><option _msttexthash="198055" _msthidden="1" _msthash="243">None Selected</option><option class="bg-primary" _msttexthash="97695" _msthidden="1" _msthash="244">Primary</option><option class="bg-secondary" _msttexthash="136136" _msthidden="1" _msthash="245">Secondary</option><option class="bg-info" _msttexthash="44447" _msthidden="1" _msthash="246">Info</option><option class="bg-success" _msttexthash="95992" _msthidden="1" _msthash="247">Success</option><option class="bg-danger" _msttexthash="74763" _msthidden="1" _msthash="248">Danger</option><option class="bg-indigo" _msttexthash="75478" _msthidden="1" _msthash="249">Indigo</option><option class="bg-purple" _msttexthash="78546" _msthidden="1" _msthash="250">Purple</option><option class="bg-pink" _msttexthash="44980" _msthidden="1" _msthash="251">Pink</option><option class="bg-navy" _msttexthash="46722" _msthidden="1" _msthash="252">Navy</option><option class="bg-lightblue" _msttexthash="134524" _msthidden="1" _msthash="253">Lightblue</option><option class="bg-teal" _msttexthash="43537" _msthidden="1" _msthash="254">Teal</option><option class="bg-cyan" _msttexthash="44330" _msthidden="1" _msthash="255">Cyan</option><option class="bg-dark" _msttexthash="43524" _msthidden="1" _msthash="256">Dark</option><option class="bg-gray-dark" _msttexthash="113568" _msthidden="1" _msthash="257">Gray dark</option><option class="bg-gray" _msttexthash="45396" _msthidden="1" _msthash="258">Gray</option><option class="bg-light" _msttexthash="59995" _msthidden="1" _msthash="259">Light</option><option class="bg-warning" _msttexthash="95225" _msthidden="1" _msthash="260">Warning</option><option class="bg-white" _msttexthash="60541" _msthidden="1" _msthash="261">White</option><option class="bg-orange" _msttexthash="75179" _msthidden="1" _msthash="262">Orange</option><a href="#" _msttexthash="60970" _msthidden="1" _msthash="263">clear</a></select></div></aside>
    <!-- /.control-sidebar -->
  <div id="sidebar-overlay"></div></div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../../plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

      var areaChartData = {
        labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
          {
            label               : 'Digital Goods',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [28, 48, 40, 19, 86, 27, 90]
          },
          {
            label               : 'Electronics',
            backgroundColor     : 'rgba(210, 214, 222, 1)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [65, 59, 80, 81, 56, 55, 40]
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines : {
              display : false,
            }
          }],
          yAxes: [{
            gridLines : {
              display : false,
            }
          }]
        }
      }

      // This will get the first returned node in the jQuery collection.
      new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
      })

      //-------------
      //- LINE CHART -
      //--------------
      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
      var lineChartOptions = $.extend(true, {}, areaChartOptions)
      var lineChartData = $.extend(true, {}, areaChartData)
      lineChartData.datasets[0].fill = false;
      lineChartData.datasets[1].fill = false;
      lineChartOptions.datasetFill = false

      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
      })

      //-------------
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData        = {
        labels: [
            'Chrome',
            'IE',
            'FireFox',
            'Safari',
            'Opera',
            'Navigator',
        ],
        datasets: [
          {
            data: [700,500,400,600,300,100],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }
        ]
      }
      var donutOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData        = donutData;
      var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0

      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }

      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })

      //---------------------
      //- STACKED BAR CHART -
      //---------------------
      var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
      var stackedBarChartData = $.extend(true, {}, barChartData)

      var stackedBarChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        scales: {
          xAxes: [{
            stacked: true,
          }],
          yAxes: [{
            stacked: true
          }]
        }
      }

      new Chart(stackedBarChartCanvas, {
        type: 'bar',
        data: stackedBarChartData,
        options: stackedBarChartOptions
      })
    })
  </script>


  </body></html> --}}