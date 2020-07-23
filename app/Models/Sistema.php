<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
   protected $table = 'sistema';

   protected $fillable = ['nombre', 'mata_descripcion', 'meta_keywords',
     'script_header', 'script_footer', 'from',];
   protected $guarded = ['id'];
}
