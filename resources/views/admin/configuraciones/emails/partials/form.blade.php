<div class="row">
  <div class="col-12 col-md-8 border-right border-right-sm-0">
    <div class="form-row">

      <div class="form-group col-12 ">
        {!! Form::label('host','Host') !!}
        {!! Form::text('host',null,['id'=>'host','placeholder'=>'Digite el host',
         'class'=>'form-control']) !!}
      </div>

      <div class="form-group col-12 ">
        {!! Form::label('port','Post') !!}
        {!! Form::number('port',null,['id'=>'port','placeholder'=>'Digite el port',
         'class'=>'form-control']) !!}
      </div>

      <div class="form-group col-12 ">
        {!! Form::label('username','Username') !!}
        {!! Form::text('username',null,['id'=>'username','placeholder'=>'Digite el username',
         'class'=>'form-control']) !!}
      </div>

      <div class="form-group col-12 ">
        {!! Form::label('password','Password') !!}
        {!! Form::text('password',null,['id'=>'password','placeholder'=>'Digite el password',
         'class'=>'form-control']) !!}
      </div>

    </div>
  </div>


  <div class="col-12 col-md-4">

    <div class="form-group col-12 ">
      {!! Form::label('active','Active') !!}
      {!! Form::select('active',$select,null,['id'=>'active', 'class'=>'form-control']) !!}
    </div>

    <div class="form-group col-12 ">
      {!! Form::label('authenticate','Authenticate') !!}
      {!! Form::select('authenticate',$select,null,['id'=>'authenticate', 'class'=>'form-control']) !!}
    </div>

    <div class="form-group col-12 ">
      {!! Form::label('smtp_secure','Smtp_secure') !!}
      {!! Form::select('smtp_secure',$smtp_secure,null,['id'=>'smtp_secure', 'class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary mb-2">Guardar información</button>
        <a href="{{route('email.index')}}" class="btn btn-danger mb-2 text-white">Cancelar</a>
    </div>

  </div>
</div>
