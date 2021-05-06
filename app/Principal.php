<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    
    public function block(){
      
        return $this->belongsTo(Block::class, 'block_id');
       
    }
    public function means(){
      
        return $this->belongsTo(MeansTitle::class, 'means_id');
       
    }
    public function evacuat(){
      
        return $this->belongsTo(EvacuationTitles::class, 'evacuation_id');
       
    }
  /*  public function type(){
      
        return $this->belongsTo(Type::class, 'type_id');
       
    }
    public function analysisTitle(){
      
        return $this->belongsTo(AnalysisTitle::class, 'analysis_titles_id');
       
    }*/
    
}
