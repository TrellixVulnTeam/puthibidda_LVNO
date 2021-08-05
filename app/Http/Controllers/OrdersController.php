<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Http\Requests\OrderRequest;

class OrdersController extends Controller
{
  protected $form_fields=['order_buyer'=>'Buyer Name','order_description'=>'Descriptions', 'order_status'=>'Status', 'book_list'=>'Book List'];
  public function __construct()
  {
       $this->middleware('auth');
  }
  public function index(){
    $entries = Order::latest()->get();
    $form_fields = $this->form_fields;
    return view('orders.index',compact('entries','form_fields'));
  }

  public function show($id){
    $entry = Order::findOrFail($id);
      $form_fields= $this->form_fields;
      //dd($book->book_published_date->diffForHumans());
      return view('orders.show',compact('entry','form_fields'));
  }

  public function create(){

    $form_fields=$this->form_fields;
    return view('orders.create',compact('form_fields'));
  }

  public function store(OrderRequest $request){
    Order::create($request->all());
    return redirect('orders');
  }
  public function edit($id){
    $form_fields=$this->form_fields;
    $entry = Order::findOrFail($id);
    return view('orders.edit',compact('entry','form_fields'));
  }
  public function update($id, OrderRequest $request){
    $order = Order::findOrFail($id);
    $order->update($request->all());
    return redirect('orders');
  }

}
