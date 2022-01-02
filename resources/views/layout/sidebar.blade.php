<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ url('/images/user.png') }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">Admin</p>
            <div class="dropdown" data-display="static">
              <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <small class="designation text-muted">Admin</small>
                <span class="status-indicator online"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                <a class="dropdown-item"> Changer Mot de passe </a>
                <a class="dropdown-item"> Notifications </a>
                <a class="dropdown-item"> Déconnexion </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </li>
    <li class="nav-item {{ active_class(['dashboard']) }}">
      <a class="nav-link" href="{{ url('dashboard') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Tableau de Bord</span>
      </a>
    </li>


    <li class="nav-item {{ active_class(['statistiques']) }}">
      <a class="nav-link" href="{{ url('statistiques') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Statistiques</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['rapports','rapports/rapport']) }}">
      <a class="nav-link" href="{{ url('rapports') }}">
        <i class="menu-icon mdi mdi-table-large"></i>
        <span class="menu-title">rapports</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['agents/parametrage']) }}">
      <a class="nav-link" href="{{ url('agents/parametrage') }}">
        <i class="menu-icon mdi mdi-settings"></i>
        <span class="menu-title">Paramétrage</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['agents/import']) }}">
      <a class="nav-link" href="{{ url('agents/import') }}">
        <i class="menu-icon mdi mdi-file"></i>
        <span class="menu-title">Importation</span>
      </a>
    </li>

  </ul>
</nav>