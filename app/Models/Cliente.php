<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['nombres', 'tipo_documento_id', 'documento', 'telefono', 'email'];
    protected $hidden = ['id', 'created_at', 'updated_at', 'cliente_id'];

  public function tipoDocumento()
  {
    return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
  }

  public function vehiculos()
  {
    return $this->belongsToMany(Vehiculo::class, 'clientes_vehiculos');
  }
}
