@extends('_master')

@section('title')
	Add a new Account
@stop

@section('content')

	<h1>Add a new Account</h1>


	{{ Form::open(array('url' => '/account/create')) }}


		{{ Form::label('yourname','Your Name') }}
		{{ Form::text('yourname'); }}
        
        {{ Form::label('youremail','Your Email') }}
		{{ Form::text('youremail'); }}
        
        {{ Form::label('yourmobile','Your Mobile') }}
		{{ Form::text('yourmobile'); }}
        
        {{ Form::label('youraddress','Your Address') }}
		{{ Form::text('youraddress'); }}
        
		{{ Form::label('devicetitle',' Device Title') }}
		{{ Form::text('devicetitle'); }}

		{{ Form::label('deviceimage','Device image') }}
		{{ Form::text('deviceimage'); }}
        
		{{ Form::label('deviceprice','Device price') }}
		{{ Form::text('deviceprice'); }}

		{{ Form::label('purchasedate','Purchase Date') }}
		{{ Form::text('purchasedate'); }}

		{{ Form::label('subscription','Software subscription') }}
		{{ Form::text('subscription'); }}
        
        {{ Form::label('renewaldate','Renewal date') }}
		{{ Form::text('renewaldate'); }}

		{{ Form::label('loginaddress','Login address') }}
		{{ Form::text('loginaddress'); }}

		{{ Form::label('username','Username') }}
		{{ Form::text('username'); }}
        
        {{ Form::label('password','Password') }}
		{{ Form::text('password'); }}

		{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop
