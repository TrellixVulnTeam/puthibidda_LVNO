<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'book_title' => 'required|min:3',
          'category_id' => 'required',
          'book_description' => 'required',
          'publisher_id' => 'required',
          'book_stock' => 'required',
          'book_price' => 'required',
          'book_offer' =>'required',
          'book_offer_rate' =>'required',
          'book_ranking' =>'required',
          'book_pages'=>'required',
          'book_published_date'=> 'required|date',
          'book_country' => 'required',
          'book_lang'=> 'required'
        ];
    }
}
