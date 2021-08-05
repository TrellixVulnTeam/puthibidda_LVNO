@extends('layouts.app')

@section('content')
	@include('errors.list')
				 {!! Form::model($entry, ['method'=>'patch','action' => ['App\Http\Controllers\UsersController@update',$entry->id]]) !!}
				 @csrf
				   		@include('partials.form',['submitButton'=>'User','hrefLink'=>'/users', 'headerTitle'=>'Update '])
				 {!! Form::close() !!}

@endsection
