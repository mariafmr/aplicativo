<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TalentTitle extends Model
{
    public function means(){
      
        return $this->belongsTo(MeansTitle::class, 'means_id');
       
    }
}
