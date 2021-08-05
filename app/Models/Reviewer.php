<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    protected $fillable = [
      'reviewer_name',
      'reviewer_email',
      'reviewer_description'
    ];

    public function books(){
      return $this->belongsToMany('App\Models\Book')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
