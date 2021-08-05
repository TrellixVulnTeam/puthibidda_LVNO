@extends('layouts.app')

@section('content')

  @include('errors.list')
                      {!! Form::open(['method'=>'POST','action' => ['App\Http\Controllers\ReviewersController@store']]) !!}
                        @csrf
                        @include('partials.form',['submitButton'=>'Reviewer','hrefLink'=>'/reviewers', 'headerTitle'=>'Reviewer '])
                      {!! Form::close() !!}
@endsection
