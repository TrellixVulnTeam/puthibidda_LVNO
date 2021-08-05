@extends('layouts.app')
@section('content')
                      {!! Form::open(['method'=>'POST','action' => ['App\Http\Controllers\BuyersController@store']]) !!}
                        @csrf
                        @include('partials.form',['submitButton'=>'Buyer','hrefLink'=>'/buyers', 'headerTitle'=>'Create New '])
                      {!! Form::close() !!}
@include('errors.list')
@endsection
