@extends('themes.layout-admin')

@section('content')
  {!! Form::model($tipo, ['route'=>['tpdocumento.update', $tipo],'files'=>true,
  'id'=>'form-user-edit', 'autocomplete'=>'off']) !!}

  @include('admin.tipo_documento.partials.form')

  {!! Form::close() !!}

@stop

@php $fullpanel = 1; @endphp
@section('title', 'Editar usuario')
@section('section', 'Editar usuario')
@section('miga')
  <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Usuarios</a></li>
  <li class="breadcrumb-item active">Editar</li>
@stop