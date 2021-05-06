<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvacuationPlanTitle extends Model
{
    public function phaseTitle(){
      
        return $this->hasMany(Phase::class);
       
    } 
    public function blockTitle(){
      
        return $this->hasMany(Block::class);
       
    }
}
