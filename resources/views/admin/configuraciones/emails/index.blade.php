@extends('themes.layout-admin')

@section('content')
  <a href="{{ route('email.create') }}" class="btn btn-primary float-right mb-3">Nuevo</a>

  <div class="table-responsive">
    <table class="table table-striped table-bordered tablaemail" width="100%">
      <thead>
      <tr>
        <th scope="col">Username</th>
        <th scope="col">Active</th>
        <th scope="col">Authenticate</th>
        <th scope="col">Smtp_secure</th>
        <th scope="col">Host</th>
        <th scope="col">Port</th>
        <th scope="col">Actualizado</th>
        <th scope="col">Acciones</th>
      </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
@stop

@php $fullpanel = 1; @endphp
@section('title', 'E-mail')
@section('section', 'E-mail')
@section('miga')
  {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
  <li class="breadcrumb-item active">E-mail</li>
@stop

@push('scripts-h')
<script>
  var emailAjaxUri = "{{ route('email.index-ajax') }}";
</script>
@endpush