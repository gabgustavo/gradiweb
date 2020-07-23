@extends('themes.layout-admin')

@section('content')
  <a href="{{ route('cliente.create') }}" class="btn btn-primary float-right mb-3">Nuevo</a>
  {{----}}
  <form method="get" action="" class="mt-5 mb-3">
    <div class="form-row align-items-center">
      <div class="col-11 my-1">
        <label class="sr-only" for="busqueda">Busqueda</label>
        <div class="input-group">
          <input type="text" class="form-control" id="busqueda" name="busqeda"
                 placeholder="Busqueda por nombre, documento y placa" value="{{$busqeda}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <button type="submit">Buscar</button></div>
          </div>
        </div>
      </div>
    </div>
  </form>
  {{----}}
  <div class="table-responsive">
    <table class="table table-striped table-bordered dt-responsive tablaclientes" width="100%">
      <thead>
      <tr>
        <th scope="col">Nombres</th>
        <th scope="col">TP Documento</th>
        <th scope="col">Documento</th>
        <th scope="col">Email</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Placa</th>
        <th scope="col">Acciones</th>
      </tr>
      </thead>
      <tbody>
        @foreach($clientes as $cliente)
          <tr>
            <td>{{$cliente->nombres}}</td>
            <td>{{$cliente->tipo_documento}}</td>
            <td>{{$cliente->documento}}</td>
            <td>{{$cliente->email}}</td>
            <td>{{$cliente->telefono}}</td>
            <td>{{$cliente->placa}}</td>
            <td>
              <a href="#" data-href="{{route('cliente.destroy', $cliente)}}"
                 data-request="ajax" class="btn btn-danger btn-delete-info mb-2 mr-1">
                <i class="far fa-trash-alt pr-1"></i>Eliminar</a>
              <a href="{{route('cliente.edit', $cliente)}}" class="btn btn-primary mb-2">
                <i class="fas fa-edit pr-1"></i>Editar</a>
            </td>
          </tr>
        @endforeach
        @if(!count($clientes))
          <tr>
            <td colspan="7">No se encontraron resultados</td>
          </tr>
        @endif
      </tbody>
    </table>
    {!! $clientes->render() !!}
  </div>
@stop

@php $fullpanel = 1; @endphp
@section('title', 'Clientes')
@section('section', 'Clientes')
@section('miga')
  {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
<li class="breadcrumb-item active">Clientes</li>
@stop

@push('scripts-h')
<script>
  var clientesAjaxUri = "{{ route('cliente.index-ajax') }}";
</script>
@endpush