@extends('layoutt')

@section('content')
<script type="text/javascript">
    function val(form)
    {
        fail=valusername(form.username.value)
        fail+=valemail(form.email.value)
        fail+=valmobile(form.mobile.value)
        if(fail=="") return true
        else {event.preventDefault(); alert(fail);  }
    }
    function valusername(field) {
        if(/[^a-zA-Z0-9_-]/.test(field))
            return "Не то Имя"
        return ""  }
    function valemail(field) {
        if(!((field.indexOf(".")>0)&&(field.indexOf("@")>0))||
            /[^a-zA-Z0-9.@_-]/.test(field))
            return "Не правильный Эмейл"
        return ""  }
    function valmobile(field) {
        if(/[^0-9_-]/.test(field))
            return "Проблемы с Мобильным?"
        return ""  }

</script>


{{Form::open(array('url'=>action('UsersController@Recordic'), 'role'=>'form',  'method'=>'post',  'class' => 'form-horizontal')) }}
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
        @elseif($k=$errors->first('comment'))
        <p>Поле Сообщение: введено неправильно либо отсутствует</p>
        @endif

    </div>
    @endif

	

      <div class="form-group">
         <div class="col-sm-4">


             <div class="col-sm-14">
                 <label class="col-sm-4 control-label"> Услуга </label>
               {{ Form::select('service', Service::all()->lists('name', 'id'), null, array('class' => 'form-control')) }}
                 </br></div>
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
                 <label class="col-sm-4 control-label"> Сообщение </label>
                 {{{ Form::textarea('comment', null, array('class' => 'form-control bbeditor')) }}}<br />
                 </br> </div>
             <div class="col-sm-14">
                 <label class="col-sm-4 control-label">  </label>

		   {{ Form::submit('Отправить', array('class' => 'btn btn-lg btn-primary btn-block')) }}
             </div>
		 </div>		    
      </div>


{{Form::close()}}

@stop