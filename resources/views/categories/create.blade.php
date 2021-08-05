@extends('layouts.app')

@section('content')
  @include('errors.list')
                      {!! Form::open(['method'=>'POST','action' => ['App\Http\Controllers\CategoriesController@store']]) !!}
                        @csrf
                        @include('partials.form',['submitButton'=>'Category','hrefLink'=>'/categories', 'headerTitle'=>'Create New '])
                      {!! Form::close() !!}
@endsection
