@extends('layouts.app')

@section('content')
	@include('errors.list')
				 {!! Form::model($entry, ['method'=>'patch','action' => ['App\Http\Controllers\BuyersController@update',$entry->id]]) !!}
				 @csrf
				   		@include('partials.form',['submitButton'=>'Buyer','hrefLink'=>'/buyers', 'headerTitle'=>'Update '])
				 {!! Form::close() !!}
@endsection
