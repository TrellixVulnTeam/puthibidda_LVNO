@extends('layouts.app')
@section('content')
@include('errors.list')
                      {!! Form::open(['method'=>'POST','action' => ['App\Http\Controllers\UsersController@store']]) !!}
                        @csrf
                        @include('partials.form',['submitButton'=>'User','hrefLink'=>'/users', 'headerTitle'=>'Create New '])
                      {!! Form::close() !!}

@endsection
