<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
          'author_name' => 'required|min:3',
          'author_country' => 'required',
          'author_description'=> 'required',
          'author_email'=> 'required',
          'author_contactno'=> 'required',
          'author_address'=> 'required'
        ];
    }
}
