@extends('layoutt')

@section('content')

{{ Form::model($order) }}

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




		 </div>		    
      </div>
   </div>
</div>

{{Form::close()}}
@stop