@extends('themes.layout-admin')

@section('content')
  {!! Form::open(['route'=>'cliente.store','files'=>true,
  'id'=>'form-user-create', 'autocomplete'=>'off','method' => 'post']) !!}

  @include('admin.clientes.partials.form')

  {!! Form::close() !!}

@stop

@php $fullpanel = 1; @endphp
@section('title', 'Crear usuario')
@section('section', 'Crear usuario')
@section('miga')
  <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Usuarios</a></li>
  <li class="breadcrumb-item active">Crear</li>
@stop