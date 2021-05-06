<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function threats(){
      
        return $this->hasMany(Threat::class);
       
    }
    public function threatsTitle(){
      
        return $this->belongsTo(ThreatsTitle::class, 'threats_titles_id');
       
    }
}
