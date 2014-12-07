@extends('_master')

@section('title')
	Log in
@stop

@section('content')

<h1>Log in</h1>

{{ Form::open(array('url' => '/login')) }}

    {{ Form::label('email') }}
    {{ Form::text('email','dipesh@sonasonic.com') }}

    {{ Form::label('password') }} (sonasonic)
    {{ Form::password('password') }}

    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop