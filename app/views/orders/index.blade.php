@extends('layoutt')

@section('content')
<script type="text/javascript">
    function val(form)
    {
        fail=valusername(form.username.value)  //вызываем функцию valname для проверки имени и если есть ошибки то записываем их в fail
        fail+=valemail(form.email.value)   //вызываем очередную функцию проверяем ошибки и если есть прибавляем к уже существующим в fail+=
        fail+=valmobile(form.mobile.value)
        if(fail=="") return true
        else {alert(fail); return false}
    }
    function valusername(field) {
        if(/[^a-zA-Z0-9_-]/.test(field))      //test функция проверки в js проверяет значение имени в (field) похожая на функцию в php preg_match
            return "Не то Имя"
        return ""  }
    function valemail(field) {
        if(!((field.indexOf(".")>0)&&(field.indexOf("@")>0))||  //функция indexOf сверяет символ("@") либо символ точки с полем field(т.е. проверяет есть внесены ли они в field)
            /[^a-zA-Z0-9.@_-]/.test(field))
            return "Не правильный Эмейл"
        return ""  }
    function valmobile(field) {
        if(/[^0-9_-]/.test(field))
            return "Проблемы с Мобильным?"
        return ""  }

</script>


{{Form::open(array('url'=>action('UsersController@Recordic'), 'role'=>'form', 'method'=>'post', 'onsubmit' => 'val(this); return true;', 'class' => 'form-horizontal')) }}
</br>
</br>
</br>
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

	
<div class="jumbotron">
   <div class="container">
      <div class="form-group">
         <div class="col-sm-5">


             <div class="col-sm-14">
                 <label class="col-sm-3 control-label"> Услуга </label>
               {{ Form::select('service', Service::all()->lists('name', 'id'), null, array('class' => 'form-control')) }}
</div>
             <div class="col-sm-14">
  <label class="col-sm-3 control-label"> Имя </label>
                 {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Имя')) }}
             </div>
             <div class="col-sm-16">
                 <label class="col-sm-3 control-label"> Фамилия </label>
            {{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'Фамилия')) }}
             </div>
             <div class="col-sm-14">
                 <label class="col-sm-3 control-label"> Отчество </label>
                 {{ Form::text('last_name',null,  array('class' => 'form-control', 'placeholder' => 'Отчество')) }}
             </div>
             <div class="col-sm-14">
                 <label class="col-sm-3 control-label"> Эмейл </label>
                 {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Эмейл')) }}
             </div>
             <div class="col-sm-14">
                 <label class="col-sm-3 control-label"> Мобильный </label>
                 {{ Form::text('mobile',null,  array('class' => 'form-control', 'placeholder' => 'Мобильный')) }}
             </div>
             <div class="col-sm-14">
                 <label class="col-sm-3 control-label"> Сообщение </label>
                 {{ Form::textarea('comment', null, array('class' => 'form-control bbeditor')) }}<br />
             </div>
             <div class="col-sm-14">
                 <label class="col-sm-3 control-label">  </label>

		   {{ Form::submit('Отправить', array('class' => 'btn btn-lg btn-primary btn-block')) }}
             </div>
		 </div>		    
      </div>
   </div>
</div>

{{Form::close()}}

@stop