@extends('themes.layout-admin')

@section('content')
  {!! Form::open(['route'=>'tpdocumento.create','files'=>true,
  'id'=>'form-user-create', 'autocomplete'=>'off','method' => 'post']) !!}

  @include('admin.tipo_documento.partials.form')

  {!! Form::close() !!}

@stop

@php $fullpanel = 1; @endphp
@section('title', 'Crear tipos de documento')
@section('section', 'Crear tipos de documento')
@section('miga')
  <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Tipos de documento</a></li>
  <li class="breadcrumb-item active">Crear</li>
@stop