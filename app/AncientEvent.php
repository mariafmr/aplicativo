<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AncientEvent extends Model
{
    public function images(){
        return $this->morphMany('App\Image','imageable');
    }

    protected $table= 'ancient_events';

    //
    protected $fillable = [
        'title','subtitle', 'content', 'link', 'fecha',
    ];

    public $timestamps = false;
}
