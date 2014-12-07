@extends('_master')

@section('title')
	Trackers
@stop

@section('content')

	<h1>All Trackers</h1>

	@if(sizeof($trackers) == 0)
		No results
	@else

		@foreach($trackers as $tracker)
        
			<section class='tracker'>

				<h2>{{ $tracker['title'] }}</h2>
             
			    <!--	<p><a href='/tracker/edit/{{$tracker['id']}}'>Edit</a></p>-->
                             				
				<img src='{{ $tracker['image'] }}'> 
                
				<br>
				              
                <div>{{ $tracker['description'] }}</div>
                
                <div>Price in $: {{ $tracker['price'] }}</div>
                
                <div> <a href='{{ $tracker['purchase_link'] }}'>PURCHASE</a> </div>
                                                        
				<div><a href='/addexistingtracker/add/{{$tracker['id']}}'>Add This Tracker to My Tracker List</a></div>
              
                <div>Created: {{ $tracker->created_at }}</div>            
                <div>Last Completed: {{ $tracker->updated_at }}</div>
             
			</section>
            
		@endforeach

	@endif

@stop







