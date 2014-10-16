@extends('layoutadminka')

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


	<div class="col-sm-2">
{{ Form::open(array('url' => action('UsersController@postLogin'), 'method' => 'post', 'role' => 'my', 'class' => 'form-horizontal')) }}

    {{ Form::text('us', null, array('class' => 'form-control', 'placeholder' => 'Имя')) }}
    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Пароль')) }}
    {{ Form::submit('Вход', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{Form::close()}}
    </div> 
</div>

</div>
@stop
