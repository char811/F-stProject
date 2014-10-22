@extends('layoutadmin')

@section('content')

</br></br></br></br></br>

<div class="form-group">
    <div class="col-sm-4">

        {{Form::model($modelorder, array('route'=>array('myadminroom/orders', $modelorder->id))) }}
        <div class="col-sm-14">
            <label class="col-sm-4 control-label"> Услуга </label>
            {{ Form::select('service', Service::all()->lists('name', 'id'), null, array('class' => 'form-control')) }}
            </br></div>
        <div class="col-sm-14">
            <label class="col-sm-4 control-label"> Статус </label>
            {{ Form::select('process', Order::$statmessage, null, array('class' => 'form-control')) }}
            </br></div>
        <div class="col-sm-14">
            <label class="col-sm-4 control-label"> Сообщение </label>
            {{ Form::textarea('comment', null, array('class' => 'form-control bbeditor')) }}<br />
            </br> </div>
        <div class="col-sm-14">
            <label class="col-sm-4 control-label">  </label>

            {{ Form::submit('Отправить', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        </div>
    </div>
</div>

{{Form::close()}}

@stop