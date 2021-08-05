<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uxcontainer extends Model
{
  protected $fillable = [
    'class','title'
  ];
  public function panels(){
    return $this->hasMany('App\Models\Uxpanel')->withTimestamps();
  }
  public function handlers(){
    return $this->belongsToMany('App\Models\Uxhandler');
  }
}
