<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uxhandler extends Model
{

  protected $fillable = [
    'psucode','name'
  ];
  public function cards(){
    return $this->belongsToMany('App\Models\Uxcard')->withPivot('active');
  }
  public function panels(){
    return $this->belongsToMany('App\Models\Uxpanel')->withPivot('active');
  }
  public function containers(){
    return $this->belongsToMany('App\Models\Uxcontainer')->withPivot('active');
  }
}
