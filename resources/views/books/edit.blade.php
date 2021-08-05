@extends('layouts.app')
@section('content')
@include('errors.list')
				 {!! Form::model($entry, ['method'=>'patch','action' => ['App\Http\Controllers\BooksController@update',$entry->id],'enctype'=>"multipart/form-data"]) !!}
				 @csrf
				   		@include('partials.form',['submitButton'=>'Book','hrefLink'=>'/books', 'headerTitle'=>'Update '])
				 {!! Form::close() !!}

@endsection
