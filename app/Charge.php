<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
   
    public function committee(){
      
        return $this->hasOne(committee::class);
       
    }
    public function brigade(){
      
        return $this->hasOne(Brigade::class);
       
    }
}
