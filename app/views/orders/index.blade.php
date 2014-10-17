@extends('layoutt')

@section('content')
{{Form::open(array('url'=>action('UsersController@Recordic'), 'role'=>'form', 'method'=>'post', 'class' => 'form-horizontal')) }}
</br>
</br>
</br>
    @if (!$errors->isEmpty())
    <div class="alert alert-danger">

        @if($k=$errors->first('mobile'))
        <p>мобильный</p>
        @elseif($k=$errors->first('username'))
        <p>имя</p>
        @elseif($k=$errors->first('email'))
        <p>эмейл</p>
        @elseif($k=$errors->first('first_name'))
        <p>фамилия</p>
        @elseif($k=$errors->first('last_name'))
        <p>отчество</p>
        @endif

    </div>
    @endif
	
<div class="jumbotron">
   <div class="container">
      <div class="form-group">
         <div class="col-sm-5">

@foreach($services as $serv)
   {{ ($serv->name) }}
@endforeach

            {{ Form::select('service', $services, null, array('class' => 'form-control')) }}
            <li>Имя{{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Имя')) }}</li>
            {{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'Фамилия')) }}
			{{ Form::text('last_name',null,  array('class' => 'form-control', 'placeholder' => 'Отчество')) }}
           {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Эмейл')) }}
			{{ Form::text('mobile',null,  array('class' => 'form-control', 'placeholder' => 'Мобильный')) }}
        {{ Form::textarea('comment', null, array('class' => 'form-control bbeditor')) }}<br />


		   {{ Form::submit('Отправить', array('class' => 'btn btn-lg btn-primary btn-block')) }}
		 </div>		    
      </div>
   </div>
</div>
<script type="text/javascript">
    function val(form)
    {
        fail=valusername(form.username.value)  //вызываем функцию valname для проверки имени и если есть ошибки то записываем их в fail
        fail+=valemail(form.email.value)   //вызываем очередную функцию проверяем ошибки и если есть прибавляем к уже существующим в fail+=
        fail+=valmobile(form.mobile.value)
        if(fail=="") return true  //если нет ошибок кнопка формы value="Enter msg" срабатывает и передает данные дальше
        else {alert(fail); return false}  // в противном случае выводим ошибку и выполняем return false тем самым говоря что есть ошибки и кнопка формы value="Enter msg" не должна сработать
    }
    function valname(field) {
        if(/[^a-zA-Z0-9_-]/.test(field))      //test функция проверки в js проверяет значение имени в (field) похожая на функцию в php preg_match
            return "ne to imya"
        return ""  }
    function valemail(field) {
        if(!((field.indexOf(".")>0)&&(field.indexOf("@")>0))||  //функция indexOf сверяет символ("@") либо символ точки с полем field(т.е. проверяет есть внесены ли они в field)
            /[^a-zA-Z0-9.@_-]/.test(field))
            return "ne to email"
        return ""  }
    function valmobile(field) {
        if(/[^a-zA-Z0-9_-]/.test(field))
            return "ne tot comment"
        return ""  }

</script>
{{Form::close()}}


@stop