@extends('layouts.app')
@section('content')
     @include('partials.list',['hrefLink'=>'/users', 'headerTitle'=>'User List'])
@stop
