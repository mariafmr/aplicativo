<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvacuationPoint extends Model
{

    protected $fillable= [
        'title', 'link', 'content', 'brigade_id', 'block_id'
    ];
    public function images(){
        return $this->morphMany('App\Image','imageable');
    }
    public function block(){
      
        return $this->belongsTo(Block::class, 'block_id');
       
    }
    public function brigade(){
      
        return $this->belongsTo(Brigade::class, 'brigade_id' );
       
    }
    public function brigade1(){
      
        return $this->belongsTo(Brigade::class, 'brigade1_id' );
       
    }
    public function brigade2(){
      
        return $this->belongsTo(Brigade::class, 'brigade2_id' );
       
    }
    public function brigade3(){
      
        return $this->belongsTo(Brigade::class, 'brigade3_id' );
       
    }
    public function brigade4(){
      
        return $this->belongsTo(Brigade::class, 'brigade4_id' );
       
    }
    public function brigade5(){
      
        return $this->belongsTo(Brigade::class, 'brigade5_id' );
       
    }
  /*  public function equipos(){
      
        return $this->belongsToMany(Brigade::class, 'equipo_id');
       
    }*/
}
