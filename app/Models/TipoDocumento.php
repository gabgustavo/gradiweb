<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipos_documentos';
    protected $fillable = ['tipo_documento'];
    protected $guarded = ['id'];

    public function clientes()
    {
      return $this->belongsTo(Cliente::class, 'tipo_documento_id');
    }
}
