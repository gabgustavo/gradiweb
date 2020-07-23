@extends('themes.layout-admin')

@section('content')
  {!! Form::model($user, ['route'=>['user.perfil', $user],'files'=>true,
  'id'=>'form-user-edit', 'autocomplete'=>'off']) !!}

  @include('admin.users.partials.form')

  {!! Form::close() !!}

@stop

@php $fullpanel = 1; @endphp
@section('title', 'Editatr el perfil')
@section('section', 'Editatr el perfil')
@section('miga')
  <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Perfil</a></li>
  <li class="breadcrumb-item active">Editar</li>
@stop