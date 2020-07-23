<div class="row">
  <div class="col-12 col-md-8 border-right border-right-sm-0">
    <div class="form-row">

      <div class="form-group col-12 col-lg-6">
          {!! Form::label('nombres','Nombre') !!}
          {!! Form::text('nombres',null,['id'=>'nombres','placeholder'=>'Digite el nombre',
           'class'=>'form-control']) !!}
      </div>

      <div class="form-group col-12 col-lg-6">
          {!! Form::label('email','E-mail') !!}
          {!! Form::text('email',null,['id'=>'email','placeholder'=>'Digite el email',
           'class'=>'form-control']) !!}
      </div>


      <div class="form-group col-12 col-lg-6">
          {!! Form::label('user','Usuario') !!}
        @if(!isset($user))
          {!! Form::text('user',null,['id'=>'user','placeholder'=>'Digite el user',
           'class'=>'form-control']) !!}
          @else
          <input type="text" value="{{$user->user}}" class="form-control" readonly>
          {!! Form::hidden('id',null) !!}
        @endif
      </div>


      <div class="form-group col-12 col-lg-6">
          {!! Form::label('password','Contraseña') !!}
        @if(isset($user))
        <small class="text-black-50">Puede dejar los campos en blanco si no desea cambiar la contraseña.</small>
        @endif
          {!! Form::password('password',['id'=>'password','placeholder'=>'Digite la contraseña',
           'class'=>'form-control']) !!}
      </div>

      <div class="form-group col-12 col-lg-6">
          {!! Form::label('password_confirmation','Confirmar contraseña') !!}
          {!! Form::password('password_confirmation',['id'=>'password_confirmation','placeholder'=>'Digite la contraseña',
           'class'=>'form-control']) !!}
      </div>

      <div class="form-group col-6">
          {!! Form::label('telefono','Teléfono') !!}
          {!! Form::text('telefono',null, ['id'=>'telefono','placeholder'=>'Digite el teléfono',
           'class'=>'form-control']) !!}
      </div>

    </div>
  </div>




  <div class="col-12 col-md-4">
    <div class="form-group">
      {!! Form::label('foto','Foto de perfil') !!} <span>(500px X 500px)</span>

      <div class="custom-file">
        <input type="file" name="foto" id="foto" class="custom-file-input"
               aria-describedby="foto">
        <label class="custom-file-label" for="foto">Seleccionar archivo</label>
      </div>
      @if(isset($user))
      <img class="mt-3 img-fluid img-thumbnail img-circle" src="{{ miAvatar($user) }}" style="max-height: 150px">
      @endif
    </div>

    @if(!isset($perfil))
    <div class="form-group col-12">
      {!! Form::label('estado','Estado del usuario') !!}
      {!! Form::select('estado',$estados, null,['id'=>'estado','class'=>'form-control']) !!}
    </div>
    @else
      <input type="hidden" name="editar_perfil" value="ok">
    @endif

    <div class="form-group">
      <button type="submit" class="btn btn-primary mb-2">Guardar información</button>
      @if(!isset($perfil))
      <a href="{{route('user.index')}}" class="btn btn-danger mb-2 text-white">Cancelar</a>
      @endif
    </div>

  </div>
</div>