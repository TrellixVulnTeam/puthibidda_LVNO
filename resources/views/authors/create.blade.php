@extends('layouts.app')
@section('content')
  @include('errors.list')
              {!! Form::open(['method'=>'POST','action' => ['App\Http\Controllers\AuthorsController@store'],'enctype'=>"multipart/form-data"]) !!}
                @csrf
                @include('partials.form',['submitButton'=>'Author', 'hrefLink'=>'/authors', 'headerTitle'=>'Create New '])
              {!! Form::close() !!}
@endsection
