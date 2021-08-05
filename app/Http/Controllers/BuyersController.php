<?php

namespace App\Http\Controllers;
use App\Models\Buyer;
use App\Http\Requests\BuyerRequest;
use Illuminate\Http\Request;

class BuyersController extends Controller
{
  protected $form_fields=['buyer_name'=>'Name', 'buyer_email'=>'Email', 'buyer_contactno'=>'Contact No', 'buyer_address'=>'Address', 'buyer_payment_detail'=>'Payment Detail'];
  public function __construct()
  {
       $this->middleware('auth');
  }
  public function index(){
    $entries = Buyer::latest()->get();
    $form_fields = $this->form_fields;
    return view('buyers.index',compact('entries','form_fields'));
  }

  public function show($id){
    $entry = Buyer::findOrFail($id);
      $form_fields= $this->form_fields;
      //dd($book->book_published_date->diffForHumans());
      return view('buyers.show',compact('entry','form_fields'));
  }

  public function create(){
    $form_fields=$this->form_fields;
    return view('buyers.create', compact('form_fields'));
  }

  public function store(BuyerRequest $request){
    Buyer::create($request->all());
    return redirect('buyers');
  }
  public function edit($id){
    $form_fields=$this->form_fields;
    $entry = Buyer::findOrFail($id);
    return view('buyers.edit',compact('entry','form_fields'));
  }
  public function update($id, BuyerRequest $request){
    $buyer = Buyer::findOrFail($id);
    $buyer->update($request->all());
    return redirect('buyers');
  }

}
