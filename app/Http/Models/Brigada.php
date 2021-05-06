<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brigada extends Model
{
   use SoftDeletes;
   protected $dates = ['deled_at'];
   protected $table = 'brigada';
   protected $hidden = ['created_at', 'updated_at'];
}
