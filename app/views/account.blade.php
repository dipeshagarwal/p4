@extends('_master')

@section('title')
	My Account
@stop

@section('content')

<h2 class='h2styling'>My Account: Details of Devices purchased by me or Dealers</h2>

<h4 class='h4styling'><a href='/account/create'>Add New Account</a></h4>

        
 @foreach($accounts as $account)
  
			<section class='account'>
				 <h3>Name: {{ $account['yourname'] }}</h3>
                 <div>Email: {{ $account['youremail'] }}</div>
                 <div>Mobile No.: {{ $account['yourmobile'] }}</div>
                 <div>Address: {{ $account['youraddress'] }}</div>
                 <div>Device Name: {{ $account['devicetitle'] }}</div>								
				 <img src='{{ $account['deviceimage'] }}'><br>       
                 <div>Purchase Price in $: {{ $account['deviceprice'] }}</div>
                 <div>Purchase Date: {{ $account['purchasedate'] }}</div>
                 <div>Software subscription: {{ $account['subscription'] }}</div>
                 <div>Renewal date: {{ $account['renewaldate'] }}</div>
                 <div>Login address: {{ $account['loginaddress'] }}</div>
                 <div>Username: {{ $account['username'] }}</div>               
                 <div>Password: {{ $account['password'] }}</div>                
                 <div>Created: {{ $account->created_at }}</div>            
                 <div>Last Completed: {{ $account->updated_at }}</div>
				<p><a href='/account/edit/{{$account['id']}}'>Edit</a></p>
			</section>
    @endforeach

@stop







