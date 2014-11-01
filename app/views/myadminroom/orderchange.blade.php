@extends('layoutadmin')

@section('content')

<div class="kit"></div>

@if(Session::has('message'))
<div class="jumbotron" align="center">
    <p>
        {{Session::get('message')}}
    </p>
</div>
@endif



        {{Form::model($modelorder, array('route'=>array('myadminroom/orders', $modelorder->id),'class' => 'form-horizontal')) }}
    <div class="form-group">
        <label class="col-sm-2 control-label"> Услуга </label>
        <div class="col-sm-5">
            {{ Form::select('service', Service::all()->lists('name', 'id'), null, array('class' => 'form-control')) }}
        </div></div>
    <div class="form-group">
        <label class="col-sm-2 control-label"> Статус </label>
        <div class="col-sm-5">
            {{ Form::select('process', Order::$statmessage, null, array('class' => 'form-control')) }}
       </div></div>
    <div class="form-group">
        <label class="col-sm-2 control-label"> Цена </label>
        <div class="col-sm-5">
        {{ Form::text('price',  null, array('class' => 'form-control')) }}
         </div></div>
    <div class="form-group">
         <label class="col-sm-2 control-label"> Сообщение </label>
         <div class="col-sm-5">
            {{ Form::textarea('comment', null, array('class' => 'form-control bbeditor')) }}
         </div></div>
    <div class="form-group">
         <label class="col-sm-2 control-label"></label>
         <div class="col-sm-5">
            {{ Form::submit('Отправить', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        </div>
    </div>


{{Form::close()}}

@stop