<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreatsTitle extends Model
{
  /*  public function images(){
        return $this->morphMany('App\Image','imageable');
    }*/
    public function type(){
      
      return $this->hasOne(Type::class);
     
  }
  

}
