

<div id='progress'></div>

<div id="content">
<span class="expand"></span>
</div>

<div id='lll'></div>
<div class="circle" id="circle"></div>
<div class="circle1"></div>
<div class="circle2">
<div class="circle3"></div></div>


@extends('layouttt')
@section('main')

<div class="container">
{{ Form::open(array('route'=>'ask', 'method'=>'post','class' => 'form-signin')) }}

    @if (!$errors->isEmpty())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    <h2 class="form-signin-heading">Form for registr</h2>

    {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
    {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Pass')) }}
    {{ Form::password('password_confirmation',  array('class' => 'form-control', 'placeholder' => 'Re pass')) }}

    {{ Form::submit('Registration', array('class' => 'btn btn-lg btn-primary btn-block', 'name'=>'ya')) }}

{{ Form::close() }}
</div>

<!--button loading-->
<button type="button" id="loading-example-btn" data-loading-text="Loading..." class="btn btn-primary">Go!!!</button>
<script>
$('button[data-loading-text]')
.on('click', function () {
    var btn = $(this)
    btn.button('loading')
    setTimeout(function () {
        btn.button('reset')
    }, 3000)
});
</script>




<!--select menu-->
    <ul class="nav nav-pills">
    <li class="active"><a href="#">Ссылка</a></li>
    <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Меню <b class="caret"></b></a>
    <ul id="menu1" class="dropdown-menu">
    <li><a href="#">Действие</a></li>
    <li><a href="#">Другое действие</a></li>
    <li><a href="#">Ссылка</a></li>
    <li class="divider"></li>
    <li><a href="#">Отделенная ссылка</a></li>
    </ul>
    </li>
    </ul>

	
	<!--Modal Window-->
<a class="btn btn-lg btn-success" href="#" data-toggle="modal"
                     data-target="#basicModal">Open Modal Window</a>
	 
<div class="modal" id="basicModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
             <h4 class="modal-title" id="myModalLabel">Name Modal Window</h4>
          </div>
        <div class="modal-body">
          <h3>Content Modal Window</h3>
        </div>
       <div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="button">Save</button></div>
 	 	          <div class="modal fade">
                  </div>
       </div>
     </div>
</div>



<!--just switch button-->	
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary">
          <input type="checkbox"> Параметр 1
        </label>
  <label class="btn btn-primary">
          <input type="checkbox"> Параметр 2
        </label>
  <label class="btn btn-primary">
          <input type="checkbox"> Параметр 3
        </label>
</div>

	
<!--select dropdown menu-->	
	<header class="navbar" role="banner">
      <div class="container">
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">DropTest <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      </div>
    </header>

  
<!--Carousel   -->  
	
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="styles/810958806.jpg" alt="..."></img>
      <div class="carousel-caption">
        ...
      </div>
    </div>    
    <div class="item">	
	<img src="styles/1.jpg" alt="..."></img>
        <div class="carousel-caption">
        ...
      </div>
    </div> 
    <div class="item">	
	<img src="styles/2.jpg" alt="..."></img>
        <div class="carousel-caption">
        ...
      </div>
    </div> 	
	    <div class="item">	
	<img src="styles/1.jpg" alt="..."></img>
        <div class="carousel-caption">
        ...
      </div>
    </div> 
	...
  </div>

  
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

<div id="ex" class="" data-ride="carousel">
<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
 Информер слева
 </button>

<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
 Информер вверху
 </button>

<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
sagittis lacus vel augue laoreet rutrum faucibus.">
 Информер внизу
 </button>

<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
 Информер справа
 </button>
</div>




<!--loading  -->
<ul id="loadbar">
    <li>
    <div id="layerFill1" class="bar"></div> <!-- Control Layer + Bar  -->
    </li>
    <li>
    <div id="layerFill2" class="bar"></div>
    </li>
    <li>
    <div id="layerFill3" class="bar"></div>
    </li>
    <li>
    <div id="layerFill4" class="bar"></div>
    </li>
    <li>
    <div id="layerFill5" class="bar"></div>
    </li>
    <li>
    <div id="layerFill6" class="bar"></div>
    </li>
    <li>
    <div id="layerFill7" class="bar"></div>
    </li>
    <li>
    <div id="layerFill8" class="bar"></div>
    </li>
    <li>
    <div id="layerFill9" class="bar"></div>
    </li>
    <li>
    <div id="layerFill10" class="bar"></div>
    </li>
</ul>
	
<p>{{ HTML::linkAction("CommsController@create", "Login") }}</p>

@stop