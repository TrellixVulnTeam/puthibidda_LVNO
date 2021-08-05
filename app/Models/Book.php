<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
class Book extends Model
{
    protected $fillable = [
      'book_title',
      'category_id',
      'book_cover',
      'book_description',
      'book_stock',
      'book_price',
      'book_offer',
      'book_offer_rate',
      'book_ranking',
      'book_pages',
      'publisher_id',
      'book_published_date',
      'book_country',
      'book_lang'
    ];
    protected $dates = ['book_published_date'];
    public function setBookPublishedDateAttribute($date){
      $this->attributes['book_published_date']= Carbon::parse($date);
    }
    public function scopePublished($query){
        $query->where('book_published_date','<=',Carbon::now());
    }

    public function scopeUnpublished($query){
        $query->where('book_published_date','>',Carbon::now());
    }

    public function scopeNewArrival($query){
      $query->where('book_published_date','>','2018-01-07 11:00:00');
    }

    public function authors(){
      return $this->belongsToMany('App\Models\Author')->withTimestamps();
    }
    public function reviewers(){
      return $this->belongsToMany('App\Models\Reviewer')->withTimestamps();
    }
    public function publisher(){
      return $this->belongsTo('App\Models\Publisher');
    }
    public function orders(){
      return $this->belongsToMany('App\Models\Order');
    }
    public function category(){
      return $this->belongsTo('App\Models\Category');
    }
}
