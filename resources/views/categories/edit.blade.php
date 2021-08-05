@extends('layouts.app')

@section('content')
	@include('errors.list')
				 {!! Form::model($entry, ['method'=>'patch','action' => ['App\Http\Controllers\CategoriesController@update',$entry->id]]) !!}
				 @csrf
				   		@include('partials.form',['submitButton'=>'Category','hrefLink'=>'/categories', 'headerTitle'=>'Update '])
				 {!! Form::close() !!}
@endsection
