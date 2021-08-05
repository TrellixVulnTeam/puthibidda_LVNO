<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'author','reviewer','buyer','publisher'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function author(){
      return $this->hasOne('App\Models\Author');
    }
    public function reviewer(){
      return $this->hasOne('App\Models\Reviewer');
    }
    public function buyer(){
      return $this->hasOne('App\Models\Buyer');
    }
    public function publisher(){
      return $this->hasOne('App\Models\Publisher');
    }
}
