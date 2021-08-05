<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable=[
    'category_title',
    'category_class',
    'category_year',
    'category_semester',
    'category_part',
    'category_session',
    'category_favorite',
    'category_relation'
  ];
  public function books(){
    return $this->hasMany('App\Models\Book');
  }

  /*public function library(){
        return $this->belongsTo('App\Library');
    }*/
}
