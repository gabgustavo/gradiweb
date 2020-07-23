<div class="row">
  <div class="col-12 col-md-8 border-right border-right-sm-0">
    <div class="form-row">

      <div class="form-group col-12">
          {!! Form::label('Rol','Rol:') !!}
         <div>{{$rol->display_name}} (<small>{{$rol->description}}</small>)</div>
      </div>
      <div class="form-group col-12 col-lg-6">
        {!! Form::label('lista-permisos','Permisos') !!}
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="permiso-todos">
          <label class="custom-control-label" for="permiso-todos">Seleccionar / Deseleccionar todos los permisos</label>
        </div>

        @foreach($permisos as $permiso)
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input mis-permisos"
                 id="permiso-{{$permiso->id}}" name="permiso[]" value="{{$permiso->id}}"
          {{in_array($permiso->id, $activos) ? 'checked' : ''}}>
          <label class="custom-control-label" for="permiso-{{$permiso->id}}">{{$permiso->display_name}}</label>
          <small>{{$permiso->description}}</small>
        </div>
        @endforeach

      </div>



    </div>
  </div>




  <div class="col-12 col-md-4">

    <div class="form-group">
      <button type="submit" class="btn btn-primary mb-2">Guardar información</button>
      <a href="{{route('user.index')}}" class="btn btn-danger mb-2 text-white">Cancelar</a>
    </div>

  </div>
</div>

@push('scripts-f')
<script>
  $(document).ready(function () {
    $("#permiso-todos").click(function() {
      if($(".mis-permisos").is(':checked'))
        $(".mis-permisos").attr('checked', false);
      else
        $(".mis-permisos").attr('checked', true);

    });
    })
</script>
@endpush