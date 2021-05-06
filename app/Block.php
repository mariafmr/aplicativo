<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public function evacuation(){
      
        return $this->hasOne(EvacuationPoint::class);
       
    }
    public function evacuationti(){
      
        return $this->belongsTo(EvacuationTitles::class, 'evacu_id');
       
    }
 
  
}
