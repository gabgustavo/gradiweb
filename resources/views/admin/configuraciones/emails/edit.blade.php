@extends('themes.layout-admin')

@section('content')
  {!! Form::model($email, ['route'=>['email.update', $email],'files'=>true,
  'id'=>'form-email-edit', 'autocomplete'=>'off']) !!}

  @include('admin.configuraciones.emails.partials.form')

  {!! Form::close() !!}

@stop

@php $fullpanel = 1; @endphp
@section('title', 'Editar post')
@section('section', 'Editar post')
@section('miga')
  <li class="breadcrumb-item"><a href="{{ route('email.index') }}">E-mail</a></li>
  <li class="breadcrumb-item active">Editar</li>
@stop