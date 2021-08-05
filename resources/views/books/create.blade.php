@extends('layouts.app')
@section('content')
@include('errors.list')
            {!! Form::open(['method'=>'POST','action' => ['App\Http\Controllers\BooksController@store'],'enctype'=>"multipart/form-data"]) !!}
              @csrf
              @include('partials.form',['submitButton'=>'Book','hrefLink'=>'/books', 'headerTitle'=>'Create New '])

            {!! Form::close() !!}
@endsection
