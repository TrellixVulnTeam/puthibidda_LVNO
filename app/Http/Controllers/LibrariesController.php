<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;

class LibrariesController extends Controller
{
	 public function __construct()
  {
    $this->middleware('auth', ['only'=>'create']);
  }
  public function welcomePage(){
    return 'You have successfully registered';
  }
  public function booksCategories(){
    return $this->getCategories();

  }
  public function show($id){

    return Library::findOrFail($id);
   }
}
