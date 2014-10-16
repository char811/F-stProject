@extends('layoutt')

@section('content')
{{Form::open(array('url'=>action('UsersController@Record'), 'role'=>'form', 'method'=>'post', 'class' => 'form-horizontal')) }}
</br>
</br>
</br>
    @if (!$errors->isEmpty())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
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

            {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Имя')) }}
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

{{Form::close()}}
@stop