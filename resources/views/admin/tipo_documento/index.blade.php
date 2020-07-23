@extends('themes.layout-admin')

@section('content')
  <a href="{{ route('tpdocumento.create') }}" class="btn btn-primary float-right mb-3">Nuevo</a>
  <div class="table-responsive">
    <table class="table table-striped table-bordered dt-responsive tablaTipoDocumento" width="100%">
      <thead>
      <tr>
        <th scope="col" width="80%">Tipo</th>
        <th scope="col">Acciones</th>
      </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
@stop

@php $fullpanel = 1; @endphp
@section('title', 'Tipo de documentos')
@section('section', 'Tipo de documentos')
@section('miga')
  {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
<li class="breadcrumb-item active">Usuarios</li>
@stop

@push('scripts-h')
<script>
  var tpdocumentosAjaxUri = "{{ route('tpdocumento.index-ajax') }}";
</script>
@endpush