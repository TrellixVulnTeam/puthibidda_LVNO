@extends('layouts.app')

@section('content')
  @include('errors.list')
                      {!! Form::open(['method'=>'POST','action' => ['App\Http\Controllers\PublishersController@store'],'enctype'=>"multipart/form-data"]) !!}
                        @csrf
                        @include('partials.form',['submitButton'=>'Publisher','hrefLink'=>'/publishers', 'headerTitle'=>'Create New '])
                      {!! Form::close() !!}
@endsection
