<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uxpanel extends Model
{
  protected $fillable = [
    'class','title','container_id'
  ];
  public function container(){
    return $this->belongsTo('App\Models\Uxcontainer');
  }
  public function cards(){
    return $this->hasMany('App\Models\Uxcard')->withTimestamps();
  }
  public function handlers(){
    return $this->hasMany('App\Models\Uxhandler')->withTimestamps();
  }

}
