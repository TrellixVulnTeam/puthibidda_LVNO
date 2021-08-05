<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
  protected  $fillable=[
      'publisher_name',
      'publisher_address',
      'publisher_image',
      'publisher_contactno',
      'publisher_email',
      'publisher_ranking'
    ];

    public function books(){
      return $this->hasMany('App\Models\Book');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
