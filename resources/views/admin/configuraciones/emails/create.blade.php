@extends('themes.layout-admin')

@section('content')
  {!! Form::open(['route'=>'email.store','files'=>true,
  'id'=>'form-email-create', 'autocomplete'=>'off','method' => 'post']) !!}

  @include('admin.configuraciones.emails.partials.form')

  {!! Form::close() !!}

@stop

@php $fullpanel = 1; @endphp
@section('title', 'Crear email')
@section('section', 'Crear email')
@section('miga')
  <li class="breadcrumb-item"><a href="{{ route('email.index') }}">E-mail</a></li>
  <li class="breadcrumb-item active">Crear</li>
@stop