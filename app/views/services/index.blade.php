@extends('layoutadmin')

@section('content')
</br></br></br>
    @if (!$errors->isEmpty())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

@if(Session::has('message'))
<div class="jumbotron" align="center">
    <p>
        {{Session::get('message')}}
    </p>
</div>
@endif

	<div class="container">
	        <div class="col-sm-2">
{{ Form::open(array('url' => action('ServicesController@store'), 'method' => 'post', 'role' => 'newserv', 'class' => 'form-horizontal')) }}
    {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Service')) }}
    {{ Form::submit('Enter', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{Form::close()}}
    </div> </div>
@stop

