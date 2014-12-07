@extends('_master')

@section('title')
	Trackers
@stop

@section('content')

	<h1>My Trackers</h1>
        
	 @foreach($trackers as $tracker)
  
			<section class='tracker'>                    
            
            	<h2>{{ $tracker['title'] }}</h2>
             		
				<img src='{{ $tracker['image'] }}'> 
                
				<br>
				              
                <div>{{ $tracker['description'] }}</div>
                
                <div>Price in $: {{ $tracker['price'] }}</div>
                
                <div> <a href='{{ $tracker['purchase_link'] }}'>PURCHASE</a> </div>
                      
				<div><a href='/tracker/edit/{{$tracker['id']}}'>Edit</a></div>
                
                <div>
                    {{---- DELETE -----}}
                    {{ Form::open(array('url' => '/tracker/delete')) }}
                        {{ Form::hidden('id',$tracker['id']); }}
                        <button onClick='parentNode.submit();return false;'>Delete</button>
                    {{ Form::close() }}
                </div>

                <div>Created: {{ $tracker->created_at }}</div>            
                <div>Last Completed: {{ $tracker->updated_at }}</div>
                
			</section>

    @endforeach
    
    
            
 @foreach($addexistingtrackers as $addexistingtracker)
  
			<section class='tracker'>                    
            
            	<h2>{{ $addexistingtracker['title'] }}</h2>
             
				<img src='{{ $addexistingtracker['image'] }}'> 
                
				<br>
				              
                <div>{{ $addexistingtracker['description'] }}</div>
                
                <div>Price in $: {{ $addexistingtracker['price'] }}</div>
                
                <div> <a href='{{ $addexistingtracker['purchase_link'] }}'>PURCHASE</a> </div>
                      
				<div><a href='/addexistingtracker/edit/{{$addexistingtracker['id']}}'>Edit</a></div>
                
                <div>
                    {{---- DELETE -----}}
                    {{ Form::open(array('url' => '/addexistingtracker/delete')) }}
                        {{ Form::hidden('id',$addexistingtracker['id']); }}
                        <button onClick='parentNode.submit();return false;'>Delete</button>
                    {{ Form::close() }}
                </div>
                
                <div>Created: {{ $addexistingtracker->created_at }}</div>            
                <div>Last Completed: {{ $addexistingtracker->updated_at }}</div>
                
			</section>
    @endforeach

@stop







