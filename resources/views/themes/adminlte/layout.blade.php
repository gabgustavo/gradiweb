<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title', 'Luis G. Avila')</title>
  <link rel="icon" href="{{asset('assets/images/icono.png')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="domain" content="{{ asset('') }}">
  <link rel="icon" href="{{sistema('favicon')}}" />
  <link rel="apple-touch-icon-precomposed" type="image/x-icon" href="{{sistema('favicon')}}" sizes="72x72" />
  <link rel="apple-touch-icon-precomposed" type="image/x-icon" href="{{sistema('favicon')}}" sizes="114x114" />
  <link rel="apple-touch-icon-precomposed" type="image/x-icon" href="{{sistema('favicon')}}" sizes="144x144" />
  <link rel="apple-touch-icon-precomposed" type="image/x-icon" href="{{sistema('favicon')}}" />


  <!-- Font Awesome -->
  @stack('scripts-first')
  <link rel="stylesheet" href="{{ asset('assets/themes/adminlte/plugins/Carousel-Slideshow-jdSlider/dist/css/common.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/themes/adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="  {{ asset('assets/themes/adminlte/plugins/datatables/jquery.dataTables.min.css') }}">
  <link rel="stylesheet" href="  {{ asset('assets/themes/adminlte/plugins/datatables/responsive.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/themes/adminlte/plugins/select2/css/select2.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/themes/adminlte/plugins/sweetalert2/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/themes/adminlte/') }}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('assets/themes/adminlte/') }}/dist/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @stack('scripts-h')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('themes.adminlte.partials.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('assets/logo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{limit(sistema('nombre'), 14)}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @include('themes.adminlte.partials.panel-user')
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @include('themes.adminlte.partials.menu')
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>@yield("section", "Blank Page")</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @include('themes.adminlte.partials.miga')
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @include('themes.adminlte.partials.alerts')
      <!-- Default box -->
      @if(isset($fullpanel))

        <div class="card">
          <div class="card-body">
            @section('content')
              <p>Start creating your amazing application!</p>
            @show
          </div>
          <!-- /.card-body -->
        </div>

      @else
        @section('content')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Aqui esta información no deberia ir</h3>
            </div>
            <div class="card-body">
              Recuerda que toda la estructura debe ser creada desde cero,
              de lo contrario inicializa la variable: <code>&commat;php $fullpanel = 1; &commat;endphp</code>
            </div>
            <!-- /.card-body -->
          </div>
        @show
      @endif
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2001 - {{date('Y')}} Z-BIKEWEAR &nbsp;&nbsp;|&nbsp;&nbsp;
      <a href="mailto:gustavoavilabar@gmail.com">Luis G. Ávila</a>.</strong> Analísta y desarrollador de sistemas a medida
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/themes/adminlte/') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/themes/adminlte/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('assets/themes/adminlte/') }}/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/themes/adminlte/') }}/dist/js/adminlte.min.js"></script>

<script src="{{ asset('assets/themes/adminlte/plugins/Carousel-Slideshow-jdSlider/dist/js/jquery.jdSlider-latest.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/themes/adminlte/plugins/select2/js/select2.full.js') }}"></script>
<script src="{{ asset('assets/themes/adminlte/plugins/inputmask/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('assets/themes/adminlte/plugins/jSignature-master/src/jSignature.js') }}"></script>
<script src="{{ asset('assets/themes/adminlte/plugins/jSignature-master/src/plugins/jSignature.CompressorSVG.js') }}"></script>
<script src="{{ asset('assets/themes/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/themes/adminlte/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/themes/adminlte/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/themes/adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/themes/adminlte/plugins/hls/hls.min.js') }}"></script>
{{--<script src="{{ asset('assets/themes/adminlte/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>--}}

<script src="{{ asset('assets/themes/adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/themes/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/themes/adminlte/') }}/dist/js/demo.js"></script>
<script src="{{ asset('assets/themes/adminlte/') }}/js/scripts.js"></script>

@stack('scripts-f')
</body>
</html>
