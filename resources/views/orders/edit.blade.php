@extends('layouts.app')

@section('content')

	@include('errors.list')
				 {!! Form::model($entry, ['method'=>'patch','action' => ['App\Http\Controllers\OrdersController@update',$entry->id]]) !!}
				 @csrf
				   		@include('partials.form',['submitButton'=>'Order' ,'hrefLink'=>'/orders' , 'headerTitle'=>'Update '])
				 {!! Form::close() !!}

@endsection
