<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalysisTitle extends Model
{
    public function threatsTitle(){
      
        return $this->hasMany(Threat::class);
       
    } 
}
