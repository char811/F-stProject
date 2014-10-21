@extends('layoutadmin')

@section('content')

{{Form::open(array('url'=>action('OrdersController@postclientChange'), 'role'=>'clientUpdate', 'method'=>'post',  'class' => 'form-horizontal')) }}
</br></br></br></br></br>

<div class="form-group">
    <div class="col-sm-4">


        <div class="col-sm-14">
            <label class="col-sm-4 control-label"> Имя </label>
            {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Имя')) }}
            </br> </div>
        <div class="col-sm-16">
            <label class="col-sm-4 control-label"> Фамилия </label>
            {{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'Фамилия')) }}
            </br></div>
        <div class="col-sm-14">
            <label class="col-sm-4 control-label"> Отчество </label>
            {{ Form::text('last_name',null,  array('class' => 'form-control', 'placeholder' => 'Отчество')) }}
            </br> </div>
        <div class="col-sm-14">
            <label class="col-sm-4 control-label"> Эмейл </label>
            {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Эмейл')) }}
            </br>  </div>
        <div class="col-sm-14">
            <label class="col-sm-4 control-label"> Телефон </label>
            {{ Form::text('mobile',null,  array('class' => 'form-control', 'placeholder' => 'Мобильный')) }}
            </br> </div>

        <div class="col-sm-14">
            <label class="col-sm-4 control-label">  </label>

            {{ Form::submit('Отправить', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        </div>
    </div>
</div>


{{Form::close()}}

@stop