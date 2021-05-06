<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalFramework extends Model
{
    public function article(){
      
        return $this->belongsTo(Article::class, 'article_id');
       
    }
}
