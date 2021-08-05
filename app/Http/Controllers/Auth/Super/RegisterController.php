<?php

namespace App\Http\Controllers\Auth\Super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

//Seller Model
use App\Models\Super;

//Auth Facade used in guard
use Auth;

class RegisterController extends Controller
{
  protected $redirectPath = 'super_home';

  public function showRegistrationForm()
  {
    return view('super.auth.register');
  }
	//Handles registration request for super
  public function register(Request $request)
  {
    $this->validator($request->all())->validate();
    $super = $this->create($request->all());
    $this->guard()->login($super);
    return redirect($this->redirectPath);
  }
    //Validates user's Input
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => 'required|max:255',
      'email' => 'required|email|max:255|unique:supers',
      'password' => 'required|min:6|confirmed',
    ]);
  }

     //Create a new super instance after a validation.
  protected function create(array $data)
  {
    return Super::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
    ]);
  }

     //Get the guard to authenticate Seller
  protected function guard()
  {
   return Auth::guard('web_super');
 }
}
