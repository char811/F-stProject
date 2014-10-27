@extends('layoutadmin')

@section('content')

{{Form::open(array('url'=>action('UsersController@myRecord'), 'role'=>'record', 'method'=>'post',  'class' => 'form-horizontal')) }}

<div class="kit"></div>

@if (!$errors->isEmpty())
<div class="alert alert-danger">

    @if($k=$errors->first('mobile'))
    <p>Поле Мобильный введено: неправильно либо отсутствует</p>
    @elseif($k=$errors->first('username'))
    <p>Поле Имя введено: неправильно либо отсутствует</p>
    @elseif($k=$errors->first('email'))
    <p>Поле Эмейл введено: неправильно либо отсутствует</p>
    @elseif($k=$errors->first('first_name'))
    <p>Поле Фамилия: введено неправильно либо отсутствует</p>
    @elseif($k=$errors->first('last_name'))
    <p>Поле Отчество: введено неправильно либо отсутствует</p>
    @endif

</div>
@endif

      <div class="form-group">
          <label class="col-sm-2 control-label"> Имя </label>
          <div class="col-sm-5">
                 {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Имя')) }}
      </div></div>
      <div class="form-group">
          <label class="col-sm-2 control-label"> Фамилия </label>
          <div class="col-sm-5">
                 {{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'Фамилия')) }}
      </div></div>
      <div class="form-group">
          <label class="col-sm-2 control-label"> Отчество </label>
          <div class="col-sm-5">
                 {{ Form::text('last_name',null,  array('class' => 'form-control', 'placeholder' => 'Отчество')) }}
      </div></div>
      <div class="form-group">
          <label class="col-sm-2 control-label"> Эмейл </label>
          <div class="col-sm-5">
                 {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Эмейл')) }}
      </div></div>
      <div class="form-group">
          <label class="col-sm-2 control-label"> Телефон </label>
          <div class="col-sm-5">
                 {{ Form::text('mobile',null,  array('class' => 'form-control', 'placeholder' => 'Мобильный')) }}
      </div></div>
      <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-5">
		         {{ Form::submit('Отправить', array('class' => 'btn btn-lg btn-primary btn-block')) }}
      </div>
      </div>


{{Form::close()}}

@stop