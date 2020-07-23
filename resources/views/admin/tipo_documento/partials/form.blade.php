<div class="row">
  <div class="col-12 col-md-8 border-right border-right-sm-0">
    <div class="form-row">

      <div class="form-group col-12 ">
          {!! Form::label('tipo_documento','Tipo de documento') !!}
          {!! Form::text('tipo_documento',null,['id'=>'tipo_documento','placeholder'=>'Digite el tipo de documento',
           'class'=>'form-control']) !!}
      </div>

    </div>
  </div>




  <div class="col-12 col-md-4">

    <div class="form-group">
      <button type="submit" class="btn btn-primary mb-2">Guardar información</button>
      @if(!isset($perfil))
      <a href="{{route('tpdocumento.index')}}" class="btn btn-danger mb-2 text-white">Cancelar</a>
      @endif
    </div>

  </div>
</div>