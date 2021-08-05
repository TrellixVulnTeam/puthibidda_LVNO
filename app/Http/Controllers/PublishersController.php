<?php

namespace App\Http\Controllers;
use App\Models\Publisher;
use App\Http\Requests\PublisherRequest;
use Image;
use Storage;

class PublishersController extends Controller
{
  protected $form_fields=['publisher_name'=>'Name','publisher_address'=>'Address', 'publisher_contactno'=>'Contact No', 'publisher_email'=>'Email', 'publisher_ranking'=>'Ranking','publisher_image'=>'Profile Picture'];
  public function __construct()
  {
       $this->middleware('auth');
  }
  public function index(){
    $ranks  = $this->getRanks();
    $entries = Publisher::latest()->get();
    $form_fields = $this->form_fields;
    return view('publishers.index',compact('entries','form_fields','ranks'));
  }

  public function show($id){
      $ranks  = $this->getRanks();
    $entry = Publisher::findOrFail($id);
      $form_fields= $this->form_fields;
      return view('publishers.show',compact('entry','form_fields','ranks'));
  }

  public function create(){
      $ranks  = $this->getRanks();
    $form_fields=$this->form_fields;
    return view('publishers.create', compact('form_fields','ranks'));
  }

  public function store(PublisherRequest $request){
    if ($request->hasFile('image')) {
              $image      = $request->file('image');
              $fileName   = time() . '.' . $image->getClientOriginalExtension();
              $img = Image::make($image->getRealPath());
              $img->resize(400, 600, function ($constraint) {
                  $constraint->aspectRatio();
              });
                $img->stream(); // <-- Key point
                Storage::disk('local')->put('public/publishers/'.$fileName, $img);
                $request['publisher_image']=$fileName;
    }
    else {
          $request['publisher_image']='';
    }
    Publisher::create($request->all());
    return redirect('publishers');
  }
  public function edit($id){
      $ranks  = $this->getRanks();
    $form_fields=$this->form_fields;
    $entry = Publisher::findOrFail($id);
    return view('publishers.edit',compact('entry','form_fields','ranks'));
  }
  public function update($id, PublisherRequest $request){
    if ($request->hasFile('image')) {
              $image      = $request->file('image');
              $baseName = time();
              $fileName   =  $baseName.'.'.$image->getClientOriginalExtension();
              $img = Image::make($image->getRealPath());
              $img->resize(400, 600, function ($constraint) {
                  $constraint->aspectRatio();
              });
                $img->stream(); // <-- Key point
                Storage::disk('local')->put('public/publishers/'.$fileName, $img);
                $img->resize(8, 20, function ($constraint) {
                    $constraint->aspectRatio();
                });
                  $img->stream(); // <-- Key point
                  Storage::disk('local')->put('public/publishers/'.$baseName.'-min.jpg', $img);
                $request['publisher_image']=$fileName;
    }
    $publisher = Publisher::findOrFail($id);
    $publisher->update($request->all());
    return redirect('publishers');
  }

}
