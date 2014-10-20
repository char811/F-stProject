@extends('layoutadminka')

@section('title')
Вход
@stop

@section('headExtra')
    {{ HTML::style('css/signin.css') }}
@stop

@section('content')
</br></br></br></br>
<div class="form-group ">
    @if (Session::has('alert'))
        <div class="alert alert-danger">
            <p>{{ Session::get('alert') }}
        </div>
    @endif


	<div class="col-sm-2">
{{ Form::open(array('url' => action('UsersController@postLogin'), 'method' => 'post', 'role' => 'my', 'class' => 'form-horizontal')) }}
        <div class="col-sm-14">
            <label class="col-sm-8 control-label"> Имя </label> {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Имя')) }}</div>
      </br>  <div class="col-sm-14">
            <label class="col-sm-8 control-label"> Пароль </label> {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Пароль')) }} </div>
        <div class="col-sm-30">
            <label  class="swap" class="checkbox">
            {{ Form::checkbox('remember-me', 1) }} Запомнить!
       </label></div>
        <div class="col-sm-14">
            <label class="col-sm-8 control-label"></label>{{ Form::submit('Вход', array('class' => 'btn btn-lg btn-primary btn-block')) }}</div>
{{Form::close()}}
    </div>
</div>

</div>


<style type="text/css">
    label.swap {
        left:70%;
        position:relative;
    }
</style>
@stop
