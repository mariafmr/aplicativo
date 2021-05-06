<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class committee extends Model
{
    public function charge(){
      
        return $this->belongsTo(Charge::class, 'charge_id');
       
    }
}
