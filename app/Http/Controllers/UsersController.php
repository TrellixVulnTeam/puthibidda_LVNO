<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
  protected $form_fields=['name'=>'Name','email'=>'Email','password'=>'Password','password_confirmation'=>'Confirm Passowrd'];
  public function __construct()
  {
       $this->middleware('auth');
  }
  public function index(){
    $entries = User::latest()->get();
    $form_fields = ['name'=>'Name','email'=>'Email'];
    return view('users.index', compact('entries','form_fields'));
  }

  public function show($id){
    $entry = User::findOrFail($id);
    $form_fields = ['name'=>'Name','email'=>'Email'];
      //dd($book->book_published_date->diffForHumans());
      return view('users.show',compact('entry','form_fields'));
  }

  public function create(){
    $form_fields=$this->form_fields;
    return view('users.create',compact('form_fields'));
  }

  public function store(UserRequest $request){
    $request['password'] = Hash::make($request->password);
    User::create($request->all());
    return redirect('users');
  }
  public function edit($id){
    $form_fields=['name'=>'Name','password'=>'Password','password_confirmation'=>'Confirm Passowrd'];
    $entry = User::findOrFail($id);
    return view('users.edit',compact('entry','form_fields'));
  }
  public function update($id, UserRequest $request){
    $user = User::findOrFail($id);
    $user->update($request->all());
    return redirect('users');
  }
  public function apiFunc(Request $request){
    return $request->user();
  }
}
