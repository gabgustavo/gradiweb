<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('dashboard')}}" class="nav-link">Inicio</a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  {{--<form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>--}}

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    {{--<li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fa-comments"></i>
        <span class="badge badge-info navbar-badge">3</span>
      </a>
    </li>--}}

    <li class="nav-item">
      <a href="{{ route('logout') }}" class="nav-link" title="salir">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
  </ul>
</nav>