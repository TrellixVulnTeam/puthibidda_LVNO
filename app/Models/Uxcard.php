<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uxcard extends Model
{
  protected $fillable = [
    'class','title','panel_id'
  ];
  public function panel(){
    return $this->belongsTo('App\Models\Uxpanel');
  }

  public function handlers(){
    return $this->belongsToMany('App\Models\Uxhandler')->withTimestamps();
  }

}
