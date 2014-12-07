@extends('_master')

@section('title')
	Add a new tracker
@stop

@section('content')

	<h1>Add a new GPS Tracker</h1>


	{{ Form::open(array('url' => '/tracker/create')) }}


		{{ Form::label('title','Title') }}
		{{ Form::text('title'); }}

		{{ Form::label('description','Description') }}
		{{ Form::text('description'); }}
        
		{{ Form::label('price','price') }}
		{{ Form::text('price'); }}

		{{ Form::label('image','Cover Image URL') }}
		{{ Form::text('image'); }}

		{{ Form::label('purchase_link','Purchase Link URL') }}
		{{ Form::text('purchase_link'); }}

		{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop

