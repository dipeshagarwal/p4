@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')

	
	<h2>Edit  {{{ $account['devicetitle'] }}}</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/account/edit')) }}

		{{ Form::hidden('id',$account['id']); }}

		<div class='form-group'>
			{{ Form::label('yourname','Your Name') }}
			{{ Form::text('yourname',$account['yourname']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('youremail','Your Email') }}
			{{ Form::text('youremail',$account['youremail']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('yourmobile','Your Mobile') }}
			{{ Form::text('yourmobile',$account['yourmobile']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('youraddress','Your Address') }}
			{{ Form::text('youraddress',$account['youraddress']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('devicetitle','Device Title') }}
			{{ Form::text('devicetitle',$account['devicetitle']); }}
		</div>
        
        <div class='form-group'>
			{{ Form::label('deviceimage','Device image') }}
			{{ Form::text('deviceimage',$account['deviceimage']); }}
		</div>
        
        <div class='form-group'>
			{{ Form::label('deviceprice','Device price') }}
			{{ Form::text('deviceprice',$account['deviceprice']); }}
		</div>
        
        <div class='form-group'>
			{{ Form::label('purchasedate','Purchase Date') }}
			{{ Form::text('purchasedate',$account['purchasedate']); }}
		</div>
        
        <div class='form-group'>
			{{ Form::label('subscription','Software subscription') }}
			{{ Form::text('subscription',$account['subscription']); }}
		</div>
        
        <div class='form-group'>
			{{ Form::label('renewaldate','Renewal date') }}
			{{ Form::text('renewaldate',$account['renewaldate']); }}
		</div>
        
        <div class='form-group'>
			{{ Form::label('loginaddress','Login address') }}
			{{ Form::text('loginaddress',$account['loginaddress']); }}
		</div>
        
        <div class='form-group'>
			{{ Form::label('username','Username') }}
			{{ Form::text('username',$account['username']); }}
		</div>
        
        <div class='form-group'>
			{{ Form::label('password','Password') }}
			{{ Form::text('password',$account['password']); }}
		</div>

		{{ Form::submit('Save'); }}

	{{ Form::close() }}

	<div>
		{{---- DELETE -----}}
		{{ Form::open(array('url' => '/account/delete')) }}
			{{ Form::hidden('id',$account['id']); }}
			<button onClick='parentNode.submit();return false;'>Delete</button>
		{{ Form::close() }}
	</div>


@stop

