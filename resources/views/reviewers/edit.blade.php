@extends('layouts.app')

@section('content')
@include('errors.list')
                {!! Form::model($entry, ['method'=>'patch','action' => ['App\Http\Controllers\ReviewersController@update',$entry->id]]) !!}
				 @csrf
				   		@include('partials.form',['submitButton'=>'Reviewer','hrefLink'=>'/reviewers', 'headerTitle'=>'Update '])
				 {!! Form::close() !!}

@endsection
