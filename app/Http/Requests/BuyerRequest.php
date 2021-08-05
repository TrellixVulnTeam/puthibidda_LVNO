<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyerRequest extends FormRequest
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
          'buyer_name'=>'required|min:3', //size-30
          'buyer_email'=>'required', //size-50
          'buyer_contactno'=>'required|max:11', //size-11
          'buyer_address'=>'required', //size-500
          'buyer_payment_detail'=>'required'
        ];
    }
}
