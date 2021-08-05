<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
      protected $fillable=[
        'buyer_name', //size-30
        'buyer_email', //size-50
        'buyer_contactno', //size-11
        'buyer_address', //size-500
        'buyer_payment_detail' //size-255
      ];
      public function orders(){
        return $this->hasMany('App\Models\Order');
      }
      public function user()
      {
          return $this->belongsTo('App\Models\User');
      }
}
