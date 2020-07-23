<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sistema;
use Illuminate\Http\Request;
use App\Http\Requests\SistemaEditRequest;
use Laracasts\Flash\Flash;
use App\Tools\Uploads;

class SistemaController extends Controller
{
  public  function edit(Sistema $sistema)
  {
    return view('admin.configuraciones.sistema', compact('sistema'));
  }
  public  function update(SistemaEditRequest $request, Sistema $sistema)
  {
    $sistema->fill($request->all())->save();

    if($request->favicon) {
      $archivo = new Uploads($request, 'favicon', '../','favicon');
      if($sistema->favicon) $archivo->deleteFiles($sistema->favicon);
      $nuevo = $archivo->uploadImage(false);
      $sistema->favicon = $nuevo;
      $sistema->save();
    }

    if($request->logo) {
      $archivo = new Uploads($request, 'logo', '','logo');
      if($sistema->logo) $archivo->deleteFiles($sistema->logo);
      $nuevo = $archivo->uploadImage(false);
      $sistema->logo = $nuevo;
      $sistema->save();
    }

    Flash::success('Información del sistema actualizado correctamente');
    return redirect()->route('sistema.edit', $sistema);
  }
}
