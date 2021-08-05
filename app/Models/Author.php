<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable=[
      'author_name',
      'author_country',
      'author_image',
      'author_description',
      'author_email',
      'author_contactno',
      'author_address'
    ];

    public function books(){
      return $this->belongsToMany('App\Models\Book')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
