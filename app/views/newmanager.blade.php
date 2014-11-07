@extends('layoutadmin')

@section('content')

{{Form::open(array('url'=>action('UsersController@managerRecord'), 'role'=>'manager', 'method'=>'post',  'class' => 'form-horizontal')) }}

<div class="kit"></div>

<div class="form-group">
    <label class="col-sm-2 control-label"> Город </label>
    <div class="col-sm-5">
        {{ Form::select('city', City::all()->lists('engname', 'id'), null, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label"> Логин </label>
    <div class="col-sm-3">
        {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Логин')) }}
    </div></div>
<div class="form-group">
    <label class="col-sm-2 control-label"> Пароль </label>
    <div class="col-sm-3">
        {{ Form::text('password',null,  array('class' => 'form-control', 'placeholder' => 'Пароль')) }}
    </div></div>
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-3">
        {{ Form::submit('Отправить', array('class' => 'btn btn-lg btn-primary btn-block')) }}
    </div></div>

{{Form::close()}}

@stop