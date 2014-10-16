
@extends('layoutadmin')

@section('title')
Our company
@stop

@section('content')
</br></br></br>
    <div class="container">
	 <h4><a href="{{action('UsersController@getService')}}">New</a></h4>
	 	 <h4><a href="{{action('UsersController@adminOrders')}}">Orders</a></h4>
		 	 <h4><a href="{{action('UsersController@adminClients')}}">Clients</a></h4>
	     </div>
<div class="jumbotron">
    <div class="container">
        <h1>All news of our company</h1>
    </div>
</div>
@stop
