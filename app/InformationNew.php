<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationNew extends Model
{
    public function eventit(){
      
        return $this->belongsTo('App\EventTitle', 'eventnew_id');
       
    }
    public function images(){
        return $this->morphMany('App\Image','imageable');
    }
}
