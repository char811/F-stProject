@extends('layoutadmin')

@section('title')
Вход
@stop

@section('headExtra')
    {{ HTML::style('css/signin.css') }}
@stop

@section('content')
</br></br></br>
<div class="container">
    @if (Session::has('alert'))
        <div class="alert alert-danger">
            <p>{{ Session::get('alert') }}
        </div>
    @endif

	<div class="col-sm-2" >
    <form class="form-search">
    {{ Form::model(null, array('route' => array('myadminroom/clients'))) }}
    {{ Form::text('username', null, array( 'placeholder' => 'Search order...', 'class'=>'input-medium search-query')) }}
    {{ Form::submit('Search',array('class'=>'btn')) }}
    {{ Form::close() }}
    </form>
</div>
</div>
@foreach($clients as $client)
{{"</br>"; $all=$client->username; }}
{{$all}}
@endforeach
</br>

{{print_r($cofs['mobile']);}}

@stop
