<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ url('/administrador/usuarios') }}" class="nav-link">Usuarios</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Perfil</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <div class="pull-right">
        <a href="{{ url('/logout') }}" data-toggle="tooltip" data-placeholder="top" class="btn btn-default btn-flat">Cerrar Sesión </a>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->