@extends('themes.layout-admin')

@section('content')
  <a href="{{ route('user.create') }}" class="btn btn-primary float-right mb-3">Nuevo</a>
  <div class="table-responsive">
    <table class="table table-striped table-bordered dt-responsive tablaUsuarios" width="100%">
      <thead>
      <tr>
        <th scope="col">Foto</th>
        <th scope="col">Nombres</th>
        <th scope="col">Email</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
      </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
@stop

@php $fullpanel = 1; @endphp
@section('title', 'Usuarios')
@section('section', 'Usuarios')
@section('miga')
  {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
<li class="breadcrumb-item active">Usuarios</li>
@stop

@push('scripts-h')
<script>
  var usuariosAjaxUri = "{{ route('user.index-ajax') }}";
</script>
@endpush