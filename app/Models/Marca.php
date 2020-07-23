<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['marca'];
    protected $guarded = ['id'];

    public function vehiculos()
    {
      return $this->hasMany(Vehiculo::class);
    }
}
