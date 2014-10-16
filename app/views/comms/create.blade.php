@extends('layout')

@section('main')	
	<div class="container">
{{ Form::open(array('route'=>'logg', 'method'=>'post','class' => 'form-signin')) }}

    @if (!$errors->isEmpty())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
	
    {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Pass')) }}

	<label class="checkbox">
        {{ Form::checkbox('remember-me', 1) }} Remember me!
    </label>
	    {{ Form::submit('Enter', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}

<ul>

@foreach($comms as $comm)
<li>
{{$id=$comm->id}}
{{ HTML::linkAction("CommsController@show", $username=$comm->username, array($comm->id)) }} - 
{{ HTML::linkAction("CommsController@destroy", "destroy", array($comm->id)) }}
</li>

@endforeach
</ul>
@stop