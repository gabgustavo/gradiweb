<div class="row">
  <div class="col-12 col-md-8 border-right border-right-sm-0">
    <div class="form-row">

      <div class="form-group col-12 col-lg-6">
          {!! Form::label('nombres','Nombre') !!}
          {!! Form::text('nombres',null,['id'=>'nombres','placeholder'=>'Digite el nombre',
           'class'=>'form-control']) !!}
      </div>

      <div class="form-group  col-12 col-lg-6">
        {!! Form::label('tipo_documento_id','Tipo de documento') !!}
        {!! Form::select('tipo_documento_id',$tipos_documento, null,['id'=>'tipo_documento_id','class'=>'form-control']) !!}
      </div>

      <div class="form-group col-12 col-lg-6">
          {!! Form::label('documento','No. de documento') !!}
          {!! Form::text('documento',null,['id'=>'documento','placeholder'=>'Digite el documento',
           'class'=>'form-control']) !!}
      </div>

      <div class="form-group col-12 col-lg-6">
          {!! Form::label('telefono','Teléfono') !!}
          {!! Form::text('telefono',null,['id'=>'telefono','placeholder'=>'Digite el telefono',
           'class'=>'form-control']) !!}
      </div>

      <div class="form-group col-12">
          {!! Form::label('email','E-mail') !!}
          {!! Form::text('email',null,['id'=>'email','placeholder'=>'Digite el email',
           'class'=>'form-control']) !!}
      </div>
      
      <div class="col-12">
        <div class="text-right mb-3">
         {{-- <a href="#" class="btn btn-primary btn-sm mr-4" title="Nuevo formulario">+</a>--}}
        </div>
        <div class="container-vehiculos">
          <div class="card mb-3">
            <div class="card-header">
              <h4 class="card-title">Vehiculo
                {{--<a href="#" class="btn btn-danger btn-sm float-right" title="Eliminar formulario">-</a>--}}
              </h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="form-group col-12 col-md-6">
                  <label for="placa">Placa</label>
                  <input id="placa" placeholder="Digite el placa" class="form-control" name="placa[]" type="text"
                   value="{{(isset($cliente) && count($cliente->vehiculos) )? $cliente->vehiculos->first()->placa: ''}}">
                </div>
                <div class="form-group col-12 col-md-6">
                  <label for="marca_id">Marca</label>
                  <select id="marca_id" class="form-control" name="marca_id[]">
                    <option value="" selected="selected">Seleccione una marca</option>
                    @foreach($marcas as $marca)
                      <option value="{{$marca->id}}"
                      {{(isset($cliente->vehiculos->first()->marca->id) && $cliente->vehiculos->first()->marca->id == $marca->id) ? 'selected' : ''}}>{{$marca->marca}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-12">
                  <label for="tipo_id">Tipo</label>
                  <select id="tipo_id" class="form-control" name="tipo_id[]">
                    <option value="" selected="selected">Seleccione un tipo</option>
                    @foreach($tipos as $tipo)
                      <option value="{{$tipo->id}}"
                        {{(isset($cliente->vehiculos->first()->tipo->id) && $cliente->vehiculos->first()->tipo->id == $tipo->id) ? 'selected' : ''}}>{{$tipo->tipo}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>




  <div class="col-12 col-md-4">

    <div class="form-group">
      <button type="submit" class="btn btn-primary mb-2">Guardar información</button>
      <a href="{{route('cliente.index')}}" class="btn btn-danger mb-2 text-white">Cancelar</a>
    </div>

  </div>
</div>