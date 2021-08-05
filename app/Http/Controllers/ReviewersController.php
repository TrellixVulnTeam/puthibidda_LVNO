<?php

namespace App\Http\Controllers;
use App\Http\Requests\ReviewerRequest;
use App\Models\Reviewer;
class ReviewersController extends Controller
{
  protected $form_fields=['reviewer_name'=>'Name','reviewer_email'=>'Email', 'reviewer_description'=>'Description'];
  public function __construct()
  {
       $this->middleware('auth');
  }
  public function index(){
    $entries = Reviewer::latest()->get();
    $form_fields = $this->form_fields;
    return view('reviewers.index',compact('entries','form_fields'));
  }
  public function show($id){
    $entry = Reviewer::findOrFail($id);
      $form_fields= $this->form_fields;
      //dd($book->book_published_date->diffForHumans());
      return view('reviewers.show',compact('entry','form_fields'));
  }
  public function create(){
    $form_fields=$this->form_fields;
    return view('reviewers.create',compact('form_fields'));
  }
  public function store(ReviewerRequest $request){
    Reviewer::create($request->all());
    return redirect('reviewers');
  }
  public function edit($id){
    $form_fields=$this->form_fields;
    $entry = Reviewer::findOrFail($id);
    return view('reviewers.edit',compact('entry','form_fields'));
  }
  public function update($id, ReviewerRequest $request){
    $reviewer = Reviewer::findOrFail($id);
    $reviewer->update($request->all());
    return redirect('reviewers');
  }
}
