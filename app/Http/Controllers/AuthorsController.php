<?php
namespace App\Http\Controllers;
use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Image;
use Storage;
class AuthorsController extends Controller
{
  protected $form_fields=['author_name'=>'Name', 'author_country'=>'Country', 'author_description'=>'Description','author_email'=> 'Email', 'author_contactno'=>'Phone', 'author_address'=>'Address', 'author_image'=>'Profile Picture'];
  public function __construct()
  {
           $this->middleware('auth', ['except'=>'allListedAuthors']);
  }
  public function index(){
    $entries = Author::latest()->get();
    $form_fields = ['author_name'=>'Name', 'author_country'=>'Country','author_email'=> 'Email', 'author_contactno'=>'Phone', 'author_image'=>'Profile Picture'];
    return view('authors.index',compact('entries','form_fields'));
  }

  public function show($id){
      $entry = Author::findOrFail($id);
      $form_fields= $this->form_fields;
      return view('authors.show',compact('entry','form_fields'));
  }

  public function create(){
    $form_fields=$this->form_fields;
    $country = $this->getCountries();
    return view('authors.create', compact('form_fields','country'));
  }

  public function store(AuthorRequest $request){
    if ($request->hasFile('image')) {
              $image      = $request->file('image');
              $fileName   = time() . '.' . $image->getClientOriginalExtension();
              $img = Image::make($image->getRealPath());
              $img->resize(300, 300, function ($constraint) {
                  $constraint->aspectRatio();
              });
                $img->stream(); // <-- Key point
                Storage::disk('local')->put('public/authors/'.$fileName, $img);
                $request['author_image']=$fileName;
    }
    else {
          $request['author_image']='';
    }
    Author::create($request->all());
    return redirect('authors');
  }
  public function edit($id){
    $form_fields=$this->form_fields;
    $entry = Author::findOrFail($id);
    $country =$this->getCountries();
    return view('authors.edit',compact('entry','form_fields','country'));
  }
  public function update($id, AuthorRequest $request){
    $author = Author::findOrFail($id);
    if ($request->hasFile('image')) {
              $image      = $request->file('image');
              $fileName   = time() . '.' . $image->getClientOriginalExtension();
              $img = Image::make($image->getRealPath());
              $img->resize(300, 300, function ($constraint) {
                  $constraint->aspectRatio();
              });
                $img->stream(); // <-- Key point
                Storage::disk('local')->put('public/authors/'.$fileName, $img);
                $request['author_image']=$fileName;
    }
    $author->update($request->all());
    return redirect('authors');
  }
  public function allListedAuthors(){
    return Author::get();
  }
}
