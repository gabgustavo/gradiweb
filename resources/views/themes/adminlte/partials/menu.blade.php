<li class="nav-item">
  <a href="{{ route('dashboard') }}" class="nav-link {{activeSubMenu('dashboard')}}">
    <i class="nav-icon fas fa-home"></i>
    <p>Inicio</p>
  </a>
</li>

<li class="nav-item">
  <a href="{{route('user.perfil', auth()->user())}}" class="nav-link {{activeSubMenu('user.perfil')}}">
    <i class="nav-icon fas fa-user"></i>
    <p>Mi perfil</p>
  </a>
</li>

<li class="nav-item has-treeview {{openMenu('user.')}}">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-users"></i>
    <p>
      Usuarios
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('user.index') }}" class="nav-link {{activeSubMenu('user.index')}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Lista general</p>
      </a>
    </li>
      <li class="nav-item">
        <a href="{{ route('user.create') }}" class="nav-link {{activeSubMenu('user.create')}}">
          <i class="far fa-circle nav-icon"></i>
          <p>Crear</p>
        </a>
      </li>
  </ul>
</li>
<li class="nav-item has-treeview {{openMenu('tpdocumento.')}}">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>
      Tipos de documento
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('tpdocumento.index') }}" class="nav-link {{activeSubMenu('tpdocumento.index')}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Lista general</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('tpdocumento.create') }}" class="nav-link {{activeSubMenu('tpdocumento.create')}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Crear</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item has-treeview {{openMenu('cliente.')}}">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-user-tie"></i>
    <p>
      Clientes
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('cliente.index') }}" class="nav-link {{activeSubMenu('cliente.index')}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Lista general</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('cliente.create') }}" class="nav-link {{activeSubMenu('cliente.create')}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Crear</p>
      </a>
    </li>
  </ul>
</li>


<li class="nav-item has-treeview {{openMenu(['sistema.', 'email.'])}}">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-cogs"></i>
    <p>
      Configuración
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('sistema.edit', sistema()) }}" class="nav-link {{activeSubMenu('sistema.edit')}}">
          <i class="far fa-circle nav-icon"></i>
          <p>Sistema</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('email.index') }}" class="nav-link {{activeSubMenu('email.')}}">
          <i class="far fa-circle nav-icon"></i>
          <p>Email</p>
        </a>
      </li>
  </ul>
</li>

<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-sign-out-alt"></i>
    <p>Cerrar sesión</p>
  </a>
</li>


{{--<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Dashboard v1</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-th"></i>
    <p> Widgets
      <span class="right badge badge-danger">New</span>
    </p>
  </a>
</li>--}}



