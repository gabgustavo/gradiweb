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

  public function scopeGetCliente($query, $documento, $status = 200)
  {
    $cliente = $query->where('documento', $documento)->first();
    $data = [];
    $data['status'] = 404;
    $data['cliente'] = null;
    if($cliente) {
      $data['status'] = $status;
      $data['cliente'] = [
        'nombre' => $cliente->nombres,
        'documento' => $cliente->documento,
        'tipo_documento' => $cliente->tipoDocumento->tipo_documento,
        'telefono' => $cliente->telefono,
        'email' => $cliente->email,
      ];
      $tmp = [];
      foreach ($cliente->vehiculos as $v) {
        $tmp[] = [
          'placa' => $v->placa,
          'tipo' => $v->tipo->tipo,
          'marca' => $v->marca->marca
        ];
      }
      $data['vehiculo'] = $tmp;
      unset($tmp);
    }

    return $data;
  }
}
