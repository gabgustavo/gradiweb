@extends('themes.layout-admin')

@section('content')
  {!! Form::model($rol, ['route'=>['user.edit-permisos', $rol],'files'=>true,
  'id'=>'form-user-edit', 'autocomplete'=>'off']) !!}

  @include('admin.users.partials.form-permisos')

  {!! Form::close() !!}

@stop

@php $fullpanel = 1; @endphp
@section('title', 'Editar usuario')
@section('section', 'Editar usuario')
@section('miga')
  <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Usuarios</a></li>
  <li class="breadcrumb-item active">Editar</li>
@stop