@extends('layouts.app')

@section('content')
@include('errors.list')
                      {!! Form::open(['method'=>'POST','action' => ['App\Http\Controllers\OrdersController@store']]) !!}
                        @csrf
                        @include('partials.form',['submitButton'=>'Order','hrefLink'=>'/orders', 'headerTitle'=>'Create New '])
                      {!! Form::close() !!}

@endsection
