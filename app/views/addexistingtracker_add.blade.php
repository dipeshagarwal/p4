@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')

	<h1>Edit</h1>
	<h2>{{{ $tracker['title'] }}}</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/addexistingtracker/add')) }}

		{{ Form::hidden('id',$tracker['id']); }}

		<div class='form-group'>
			{{ Form::label('title','Title') }}
			{{ Form::text('title',$tracker['title']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('description','Description') }}
			{{ Form::text('description',$tracker['description']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('price','price') }}
			{{ Form::text('price',$tracker['price']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('image','Cover Image URL') }}
			{{ Form::text('image',$tracker['image']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('purchase_link','Purchase Link URL') }}
			{{ Form::text('purchase_link',$tracker['purchase_link']); }}
		</div>

		{{ Form::submit('Add Another User Tracker to your My Tracker List'); }}

	{{ Form::close() }}

	<div>
		{{---- DELETE -----}}
		{{ Form::open(array('url' => '/addexistingtracker/delete')) }}
			{{ Form::hidden('id',$tracker['id']); }}
			<button onClick='parentNode.submit();return false;'>Delete</button>
		{{ Form::close() }}
	</div>


@stop

