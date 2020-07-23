@extends('themes.layout-admin')

@section('content')
  {!! Form::model($sistema, ['route'=>['sistema.update', $sistema],'files'=>true,
  'id'=>'form-post-edit', 'autocomplete'=>'off']) !!}

  <div class="row">
    <div class="col-12 col-md-8 border-right border-right-sm-0">
      <div class="form-row">

        <div class="form-group col-12 ">
          {!! Form::label('nombre','Nombre del sistio') !!}
          {!! Form::text('nombre',null,['id'=>'nombre','placeholder'=>'Digite el nombre del sitio',
           'class'=>'form-control']) !!}
        </div>

        <div class="form-group col-12 ">
          {!! Form::label('from','Remitente de los correos') !!}
          <code>no-reply@midominio.com</code>
          {!! Form::text('from',null,['id'=>'from','placeholder'=>'no-reply@midominio.com',
           'class'=>'form-control']) !!}
        </div>

        <div class="form-group col-12">
          {!! Form::label('mata_descripcion','meta desciption a nivel general') !!}
          {!! Form::textarea('mata_descripcion',null,['id'=>'mata_descripcion', 'class'=>'form-control', 'rows' => 5]) !!}
        </div>

        <div class="form-group col-12 ">
          {!! Form::label('meta_palabaras_claves','Palabras claves a nivel general') !!}
          {!! Form::textarea('meta_palabaras_claves',null,['id'=>'meta_palabaras_claves', 'class'=>'form-control', 'rows' => 5]) !!}
        </div>

        <div class="form-group col-12 ">
          {!! Form::label('script_header','Script de seguimiento en el head del sitio') !!}
          <code> aquí va su códido&lt;/head&gt;</code>
          {!! Form::textarea('script_header',null,['id'=>'script_header', 'class'=>'form-control', 'rows' => 5]) !!}
        </div>

        <div class="form-group col-12 ">
          {!! Form::label('script_footer','Script de seguimiento en el footer del sitio') !!}
          <code> aquí va su códido&lt;/body&gt;</code>
          {!! Form::textarea('script_footer',null,['id'=>'script_footer', 'class'=>'form-control', 'rows' => 5]) !!}
        </div>

      </div>
    </div>
    <div class="col-12 col-md-4">

      <div class="form-group col-12">
        {!! Form::label('favicon','Favicon del sitio web') !!} <span> max (30px X 30px)</span>

        <div class="custom-file">
          <input type="file" name="favicon" id="favicon" class="custom-file-input"
                 aria-describedby="favicon">
          <label class="custom-file-label" for="favicon">Seleccionar archivo</label>
        </div>
        @if(isset($sistema))
          <img src="{{sistema('favicon')}}" class="mt-3 img-fluid">
        @endif
      </div>

      <div class="form-group col-12">
        {!! Form::label('logo','Logo del sitio') !!} <span> (****px X ****px)</span>

        <div class="custom-file">
          <input type="file" name="logo" id="logo" class="custom-file-input"
                 aria-describedby="logo">
          <label class="custom-file-label" for="logo">Seleccionar archivo</label>
        </div>
        @if(isset($sistema))
          <img src="{{sistema('logo')}}" class="mt-3 img-fluid">
        @endif
      </div>

      <div class="form-group pl-2">
        <button type="submit" class="btn btn-primary mb-2">Guardar información</button>
      </div>

    </div>

    </div>
  </div>

  {!! Form::close() !!}

@stop

@php $fullpanel = 1; @endphp
@section('title', 'Sistema')
@section('section', 'Sistema')
@section('miga')
  <li class="breadcrumb-item"><a href="{{ route('sistema.edit', sistema()) }}">Sistema</a></li>
  <li class="breadcrumb-item active">Editar</li>
@stop