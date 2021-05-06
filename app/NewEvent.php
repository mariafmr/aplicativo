<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewEvent extends Model
{
    public function images(){
        return $this->morphMany('App\Image','imageable');
    }

    protected $table= 'new_events';

    //
    protected $fillable = [
        'title','subtitle', 'content', 'link', 'fecha',
    ];

    public $timestamps = false;

    public function event(){
      
        return $this->belongsTo('App\EventTitle', 'event_id');
       
    }
}
