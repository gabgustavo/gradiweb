<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
   protected $table = 'email_settings';
   protected $fillable = ['active', 'authenticate', 'smtp_secure', 'host', 'port', 'username', 'password'];
   protected $guarded = ['id'];

  public function scopeSetting()
  {
    return self::where('active', 1)->first();
  }
}
