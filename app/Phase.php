<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    public function evacuationtitle(){
      
        return $this->belongsTo('App\EvacuationTitles', 'evacuation_id');
       
    }
  
   
}
