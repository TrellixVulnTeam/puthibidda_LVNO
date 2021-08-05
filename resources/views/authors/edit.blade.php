@extends('layouts.app')

@section('content')
@include('errors.list')
				 {!! Form::model($entry, ['method'=>'patch','action' => ['App\Http\Controllers\AuthorsController@update',$entry->id],'enctype'=>"multipart/form-data"]) !!}
				 @csrf
				   		@include('partials.form',['submitButton'=>'Author', 'hrefLink'=>'/authors','headerTitle'=>'Update '])
				 {!! Form::close() !!}
@endsection
