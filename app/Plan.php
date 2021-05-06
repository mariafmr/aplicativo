<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function block(){
      
        return $this->belongsTo(Block::class, 'block_id');
       
    }
    public function evacuat(){
      
        return $this->belongsTo(EvacuationPlanTitle::class, 'evacuation_id');
       
    }
   
}
