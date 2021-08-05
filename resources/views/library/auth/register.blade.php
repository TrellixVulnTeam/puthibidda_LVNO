@extends('layouts.app')
@section('content')
{{-- {!! Form::open(['method'=>'POST','action' => ['Auth\Library\RegisterController@register'],'enctype'=>"multipart/form-data"]) !!} --}}
{{-- @csrf --}}
<new-registration></new-registration>
{{-- {!! Form::close() !!} --}}
@endsection
