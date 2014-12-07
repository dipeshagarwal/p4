@extends('_master')

@section('title')
	Log in
@stop

@section('content')
<h1>Sign up</h1>

@foreach($errors->all() as $message)
	<div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => '/signup')) }}

    {{ Form::label('name') }}
    {{ Form::text('name') }}<br>

    {{ Form::label('email') }}
    {{ Form::text('email') }}<br>

    {{ Form::label('password') }}
    {{ Form::password('password') }}
    <small>Min 6 characters</small>

    {{ Form::submit('Submit') }}

{{ Form::close() }}
@stop