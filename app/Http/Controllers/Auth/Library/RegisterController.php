<?php

namespace App\Http\Controllers\Auth\Library;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

//Seller Model
use App\Models\Library;
use Image;
use Storage;

//Auth Facade used in guard
use Auth;

class RegisterController extends Controller
{
  protected $redirectTo = '/libraries/home';
  public function __construct()
  {
    $this->middleware('guest');
  }
  public function showRegistrationForm()
  {
    return view('library.auth.register');
  }
  public function simpleRegistrationForm()
  {
    $districts=$this->getDistricts();
    return view('library.auth.mregister',compact('districts'));
  }

    //Handles registration request for super
  public function register(Request $request)
  {

    $this->validator($request->all())->validate();
    $requestData = $request->all();
    if ($request->hasFile('library_cover')) {
      $image      = $request->file('library_cover');
      $fileName   = time() . '.' . $image->getClientOriginalExtension();
      $img = Image::make($image->getRealPath());
      $img->fit(475, 320, function ($constraint) {
        $constraint->upsize();
      });
          // $img->resize(475, 320, function ($constraint) {
          //       $constraint->aspectRatio();
          //   });
      $img->stream();
      Storage::disk('local')->put('public/librarycovers/'.$fileName, $img);
      $requestData['library_cover'] = $fileName;
    }
    else {
      $requestData['library_cover'] = '';
    }
        // $library = $this->create($requestData);
        // $this->guard()->login($library);
        // return redirect($this->redirectTo);
    $library = new Library($requestData);
    $library->save();
    /*$preferences = explode(',', $requestData['library_preferences']);
    // dd($preferences);
    foreach ($preferences as $key => $value) {
     $library->categories()->add($value);
   }*/

   return $library;
 }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
     return Validator::make($data, [
      'library_title' => ['required', 'string', 'max:100'],
      'library_address' => ['required', 'string', 'max:200'],
      'library_state' => ['required', 'string', 'max:100'],
      'library_district' => ['required', 'string', 'max:100'],
      'library_preferences' => ['string', 'max:100'],
      'library_payment_type' => ['required', 'string', 'max:100'],
      'library_owner' => ['required', 'string', 'max:100'],
      'library_cover' => ['required', 'image','max:512'],
      'library_contactno' => ['required', 'string', 'max:13','unique:libraries'],
      'library_est_date' => ['required','date'],
      'library_email' => ['required', 'string', 'email', 'max:100', 'unique:libraries'],
      'library_password' => ['required','between:6,256','confirmed']
    ]);
   }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Library
     */
    protected function create(array $data)
    {

       // dd($data);

     return Library::create([
      'library_title' => $data['library_title'],
      'library_description'=> $data['library_description'],
      'library_address' => $data['library_address'],
      'library_state' => $data['library_state'],
      'library_district' => $data['library_district'],
      'library_cover' => $data['library_cover'],
      'library_payment_type' => $data['library_payment_type'],
      'library_owner' => $data['library_owner'],
      'library_contactno' => $data['library_contactno'],
      'library_telephone' => $data['library_telephone'],
      'library_est_date' => $data['library_est_date'],
      'library_email' => $data['library_email'],
      'library_password' => Hash::make($data['library_password']),
    ]);
   }
   protected function guard()
   {
     return Auth::guard('web_library');
   }
 }
