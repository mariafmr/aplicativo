<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeansTitle extends Model
{
    public function  talentsTitle(){
      
        return $this->hasMany(TalentTitle::class);
       
    } 
}
