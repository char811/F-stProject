@extends('layoutt')

@section('title')
Our company
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>Наша компания</h1>
        <p>Ниже форма которую вы можете заполнить </p>
    </div>
</div>


{{Form::open(array('url'=>action('UsersController@Recordic'), 'role'=>'form',  'method'=>'post', 'class' => 'form-horizontal registrationForm jquerymask')) }}
<div class="otp">
</div>
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
    @elseif($k=$errors->first('comment'))
    <p>Поле Сообщение: введено неправильно либо отсутствует</p>
    @endif

</div>
@endif

@if(Session::has('message'))
<div class="jumbotron" align="center">
    <p>
        {{Session::get('message')}}
    </p>
</div>
@endif

        <div class="form-group">
                <label class="col-sm-2 control-label"> Услуга </label>
            <div class="col-sm-5">
                {{ Form::select('service', Service::all()->lists('name', 'id'), null, array('class' => 'form-control', 'id'=>'tpp')) }}
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-5">
                {{ Form::text('username', null, array('class' => 'form-control','id'=>'tpp', 'placeholder' => 'Имя')) }}
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label"> Фамилия </label>
            <div class="col-sm-5">
                {{ Form::text('first_name', null, array('class' => 'form-control', 'id'=>'tpp', 'placeholder' => 'Фамилия')) }}
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label"> Отчество </label>
            <div class="col-sm-5">
                {{ Form::text('last_name', null,  array('class' => 'form-control','id'=>'tpp', 'placeholder' => 'Отчество')) }}
             </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label"> Эмейл </label>
            <div class="col-sm-5">
                {{ Form::email('email', null, array('class' => 'form-control', 'id'=>'tpp', 'placeholder' => 'Эмейл')) }}
              </div>
        </div>
        <div class="form-group">
               <label class="col-sm-2 control-label"> Мобильный </label>
            <div class="col-sm-5">
                {{ Form::text('mobile', null,  array('class' => 'form-control mobile', 'id'=>'tpp', 'placeholder' => '0(000)-000-00-00')) }}
            </div> </div>
        <div class="form-group">
                <label class="col-sm-2 control-label"> Сообщение </label>
            <div class="col-sm-5">
                {{ Form::textarea('comment', null, array('class' => 'form-control bbeditor', 'id'=>'tpp')) }}<br />
                </div> </div>
        <div class="form-group">
                <label class="col-sm-2 control-label">  </label>
            <div class="col-sm-5">
                {{ Form::submit('Отправить', array('class' => 'btn btn-lg btn-primary btn-block')) }}
            </div>
    </div>
</div>


{{Form::close()}}

@stop
