<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Threat extends Model
{
    
    public function type(){
      
        return $this->belongsTo(Type::class, 'type_id');
       
    }
    public function analysis(){
      
        return $this->belongsTo(AnalysisTitle::class, 'analysis_id');
       
    }
    
    
}
