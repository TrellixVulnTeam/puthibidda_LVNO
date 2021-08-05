<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Library extends Authenticatable
{
	protected  $fillable=[
		'library_title',
		'library_description',
		'library_address',
		'library_district',
		'library_state',
		'library_payment_type',
		'library_owner',
		'library_contactno',
		'library_telephone',
		'library_cover',
		'library_preferences',
		'library_est_date',
		'library_email',
		'library_password',

	];
	protected $hidden = [
		'library_password', 'library_ranking','library_reffered_by',	'library_end_date'
	];
	/*public function categories(){
		return $this->hasMany('App\Category');
	}*/
}
