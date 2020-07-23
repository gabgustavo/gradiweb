<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{

  public function clientes()
  {
    return $this->belongsToMany(Cliente::class, 'clientes_vehiculos');
  }

  public function marca()
  {
    return $this->belongsTo(Marca::class);
  }

  public function tipo()
  {
    return $this->belongsTo(Tipo::class);
  }
}
