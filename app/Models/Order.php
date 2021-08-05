<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
      'buyer_id',
      'order_description',
      'order_status',
      'order_start_at',
      'order_end_at',
    ];
    public function books(){
      return $this->belongsToMany('App\Models\Book');
    }
}
