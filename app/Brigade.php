<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brigade extends Model
{
    public function charge(){
      
        return $this->belongsTo(Charge::class, 'charge_id');
       
    }
    public function evacuation(){
      
        return $this->hasOne(EvacuationPoint::class);
       
    }
  
}
