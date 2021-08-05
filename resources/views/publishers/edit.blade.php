@extends('layouts.app')

@section('content')
	@include('errors.list')
				 {!! Form::model($entry, ['method'=>'patch','action' => ['App\Http\Controllers\PublishersController@update',$entry->id],'enctype'=>"multipart/form-data"]) !!}
				 @csrf
				   		@include('partials.form',['submitButton'=>'Publisher','hrefLink'=>'/publishers', 'headerTitle'=>'Update '])
				 {!! Form::close() !!}

@endsection
