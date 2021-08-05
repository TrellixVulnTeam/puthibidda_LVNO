<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
  protected $form_fields=['category_title'=>'Title','category_class'=>'Class','category_year'=> 'Year','category_semester'=>'Semester', 'category_part'=>'Part','category_session'=>'Session','category_favorite'=>'Favortite','category_relation'=>'Relation'];
  public function __construct()
  {
   $this->middleware('auth',['except'=>['getCategories','getmCategories']]);
 }
 public function index(){
  $classes=$this->getClasses();
  $years=$this->getYears();
  $semesters=$this->getSemesters();
  $parts=$this->getParts();
  $sessions=$this->getSessions();
  $favorites=$this->getFavorites();
  $relations=$this->getRelations();

  $categories=$this->getCategories();
  $entries = Category::latest()->get();
  $form_fields = $this->form_fields;
  return view('categories.index',compact('entries','form_fields','categories','classes','years','semesters','parts','sessions','favorites','relations'));
}
public function show($id){
  $classes=$this->getClasses();
  $years=$this->getYears();
  $semesters=$this->getSemesters();
  $parts=$this->getParts();
  $sessions=$this->getSessions();
  $favorites=$this->getFavorites();
  $relations=$this->getRelations();

  $categories=$this->getCategories();
  $entry = Category::findOrFail($id);
  $form_fields= ['category_class'=>'Class','category_year'=> 'Year','category_semester'=>'Semester', 'category_part'=>'Part','category_session'=>'Session','category_favorite'=>'Favortite','category_relation'=>'Relation'];
  return view('categories.show',compact('entry','form_fields','categories','classes','years','semesters','parts','sessions','favorites','relations'));
}

public function create(){
  $classes=$this->getClasses();
  $years=$this->getYears();
  $semesters=$this->getSemesters();
  $parts=$this->getParts();
  $sessions=$this->getSessions();
  $favorites=$this->getFavorites();
  $relations=$this->getRelations();

  $categories=$this->getCategories();
  $form_fields=$this->form_fields;
  return view('categories.create',compact('form_fields','categories','classes','years','semesters','parts','sessions','favorites','relations'));
}

public function store(CategoryRequest $request){
  $this->validate($request, ['category_title'=>'required']);
  Category::create($request->all());
  return redirect('categories');
}
public function edit($id){
  $classes=$this->getClasses();
  $years=$this->getYears();
  $semesters=$this->getSemesters();
  $parts=$this->getParts();
  $sessions=$this->getSessions();
  $favorites=$this->getFavorites();
  $relations=$this->getRelations();

  $categories=$this->getCategories();
  $form_fields=['category_class'=>'Class','category_year'=> 'Year','category_semester'=>'Semester', 'category_part'=>'Part','category_session'=>'Session','category_favorite'=>'Favortite','category_relation'=>'Relation'];
  $entry = Category::findOrFail($id);
  return view('categories.edit',compact('entry','form_fields','categories','classes','years','semesters','parts','sessions','favorites','relations'));
}
public function update($id, CategoryRequest $request){
  if($request['category_title']!=null){
    $error = \Illuminate\Validation\ValidationException::withMessages([
     'category_title' => ['Category title unique can\'t be changed.'],
   ]);
    throw $error;
  }
  $category = Category::findOrFail($id);
  $category->update($request->all());
  return redirect('categories');
}
//mobile services
public function getmCategories(){
  // $classes=$this->getClasses();
  // $years=$this->getYears();
  // $semesters=$this->getSemesters();
  // $parts=$this->getParts();
  // $sessions=$this->getSessions();
  // $favorites=$this->getFavorites();
  // $relations=$this->getRelations();

  $categories=$this->getCategories();

  $entries = Category::select('id','category_id','category_title')->get();
  foreach ($entries as $key => $value) {
    $entries[$key]['category_title']=$categories[$value['category_title']];
    // $entries[$key]['category_class']=$classes[$value['category_class']];
    // $entries[$key]['category_year']=$years[$value['category_year']];
    // $entries[$key]['category_semester']=$semesters[$value['category_semester']];
    // $entries[$key]['category_part']=$parts[$value['category_part']];
    // $entries[$key]['category_session']=$sessions[$value['category_session']];
    // $entries[$key]['category_favorite']=$favorites[$value['category_favorite']];
    // $entries[$key]['category_relation']=$relations[$value['category_relation']];
  }
  $form_fields = $this->form_fields;
  // return view('categories.index',compact('entries','form_fields','categories','classes','years','semesters','parts','sessions','favorites','relations'));
   return response()->json([
      'categories' => $entries
    ], 200, [], JSON_UNESCAPED_UNICODE);
}

}
