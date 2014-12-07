@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')

	<h1>Edit</h1>
	<h2>{{{ $addexistingtracker['title'] }}}</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/addexistingtracker/edit')) }}

		{{ Form::hidden('id',$addexistingtracker['id']); }}

		<div class='form-group'>
			{{ Form::label('title','Title') }}
			{{ Form::text('title',$addexistingtracker['title']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('description','Description') }}
			{{ Form::text('description',$addexistingtracker['description']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('price','price') }}
			{{ Form::text('price',$addexistingtracker['price']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('image','Cover Image URL') }}
			{{ Form::text('image',$addexistingtracker['image']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('purchase_link','Purchase Link URL') }}
			{{ Form::text('purchase_link',$addexistingtracker['purchase_link']); }}
		</div>

		{{ Form::submit('Save'); }}

	{{ Form::close() }}

	<div>
		{{---- DELETE -----}}
		{{ Form::open(array('url' => '/addexistingtracker/delete')) }}
			{{ Form::hidden('id',$addexistingtracker['id']); }}
			<button onClick='parentNode.submit();return false;'>Delete</button>
		{{ Form::close() }}
	</div>


@stop

